<?php
/**
 * Procesa el formulario de contacto y enruta el correo al departamento correcto
 * (general, franquicias, talento o administración) usando CONTACT_ROUTES.
 */

define('SITE_ACCESS', true);
session_start();

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/mailer.php';

header('Content-Type: application/json; charset=UTF-8');

function respond(bool $success, string $message): void
{
    http_response_code($success ? 200 : 422);
    echo json_encode(['success' => $success, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Método no permitido.');
}

// --- Honeypot anti-spam: campo oculto que solo un bot llenaría ---
if (!empty($_POST['website'])) {
    respond(true, 'Gracias por tu mensaje.'); // Respondemos "ok" sin enviar nada, para no delatar el honeypot.
}

// --- Límite simple de envíos (1 cada 20 segundos por sesión) ---
$now = time();
if (!empty($_SESSION['last_contact_submit']) && ($now - $_SESSION['last_contact_submit']) < 20) {
    respond(false, 'Ya recibimos tu mensaje, danos un momento antes de enviar otro.');
}

// --- Validación de token CSRF ---
$token = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    respond(false, 'Tu sesión expiró, recarga la página e inténtalo de nuevo.');
}

// --- Recolección y saneo de campos ---
$name    = trim(strip_tags($_POST['name'] ?? ''));
$email   = trim($_POST['email'] ?? '');
$phone   = trim(strip_tags($_POST['phone'] ?? ''));
$dept    = trim($_POST['department'] ?? 'general');
$message = trim(strip_tags($_POST['message'] ?? ''));

if ($name === '' || mb_strlen($name) < 2) {
    respond(false, 'Por favor escribe tu nombre.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'El correo electrónico no es válido.');
}

if ($message === '' || mb_strlen($message) < 5) {
    respond(false, 'Cuéntanos un poco más en tu mensaje.');
}

if (!array_key_exists($dept, CONTACT_ROUTES)) {
    $dept = 'general';
}

$deptLabels = [
    'general'        => 'Información general',
    'franquicias'    => 'Franquicias',
    'talento'        => 'Trabaja con nosotros',
    'administracion' => 'Administración',
];

$to      = CONTACT_ROUTES[$dept];
$subject = sprintf('[%s] Nuevo contacto — %s', $deptLabels[$dept], $name);

$bodyRows = [
    'Departamento' => $deptLabels[$dept],
    'Nombre'       => $name,
    'Correo'       => $email,
    'Teléfono'     => $phone !== '' ? $phone : 'No proporcionado',
    'Fecha'        => date('d/m/Y H:i'),
];

$htmlBody = '<div style="font-family: Arial, sans-serif; color:#1a1a1a; max-width:560px;">';
$htmlBody .= '<h2 style="color:#c81020; margin-bottom:4px;">Nuevo mensaje desde ' . htmlspecialchars(SITE_NAME) . '</h2>';
$htmlBody .= '<table cellpadding="6" cellspacing="0" style="border-collapse:collapse; width:100%;">';
foreach ($bodyRows as $label => $value) {
    $htmlBody .= '<tr><td style="font-weight:bold; vertical-align:top; width:120px;">' . htmlspecialchars($label) . '</td>';
    $htmlBody .= '<td>' . nl2br(htmlspecialchars($value)) . '</td></tr>';
}
$htmlBody .= '</table>';
$htmlBody .= '<p style="font-weight:bold; margin-top:16px;">Mensaje:</p>';
$htmlBody .= '<p style="white-space:pre-line; background:#f5f3ee; padding:12px; border-radius:6px;">' . nl2br(htmlspecialchars($message)) . '</p>';
$htmlBody .= '</div>';

$sent = send_site_mail($to, $subject, $htmlBody, $email, $name);

if (!$sent) {
    error_log('No se pudo enviar el correo de contacto a ' . $to);
    respond(false, 'Ocurrió un problema al enviar tu mensaje. Intenta de nuevo más tarde.');
}

$_SESSION['last_contact_submit'] = $now;

respond(true, '¡Gracias! Tu mensaje fue enviado, te responderemos pronto.');
