<?php
/**
 * Envío de correo con degradado elegante:
 * usa PHPMailer + SMTP si está instalado y configurado (config.php),
 * y cae automáticamente a la función mail() nativa de PHP si no.
 */

if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}

/**
 * Envía un correo.
 *
 * @param string $to          Correo destino
 * @param string $subject     Asunto
 * @param string $htmlBody    Cuerpo en HTML
 * @param string $replyToMail Correo de la persona que llenó el formulario
 * @param string $replyToName Nombre de la persona que llenó el formulario
 * @return bool true si el correo se envió (o se encoló) correctamente
 */
function send_site_mail(string $to, string $subject, string $htmlBody, string $replyToMail = '', string $replyToName = ''): bool
{
    $autoload = __DIR__ . '/../vendor/autoload.php';

    if (MAIL_USE_SMTP && SMTP_HOST !== '' && file_exists($autoload)) {
        require_once $autoload;

        if (class_exists('PHPMailer\\PHPMailer\\PHPMailer')) {
            return send_via_phpmailer($to, $subject, $htmlBody, $replyToMail, $replyToName);
        }
    }

    return send_via_native_mail($to, $subject, $htmlBody, $replyToMail, $replyToName);
}

function send_via_phpmailer(string $to, string $subject, string $htmlBody, string $replyToMail, string $replyToName): bool
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE === 'ssl'
            ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS
            : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        $mail->addAddress($to);

        if ($replyToMail !== '') {
            $mail->addReplyTo($replyToMail, $replyToName ?: $replyToMail);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $htmlBody;
        $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $htmlBody));

        return $mail->send();
    } catch (Exception $e) {
        error_log('Mailer (SMTP) error: ' . $e->getMessage());
        return false;
    }
}

function send_via_native_mail(string $to, string $subject, string $htmlBody, string $replyToMail, string $replyToName): bool
{
    $headers   = [];
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = sprintf('From: %s <%s>', MAIL_FROM_NAME, MAIL_FROM_EMAIL);

    if ($replyToMail !== '') {
        $fromHeader = $replyToName !== '' ? "$replyToName <$replyToMail>" : $replyToMail;
        $headers[] = 'Reply-To: ' . $fromHeader;
    }

    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

    return @mail($to, $encodedSubject, $htmlBody, implode("\r\n", $headers));
}
