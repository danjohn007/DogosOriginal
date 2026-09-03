<?php
/**
 * Configuración central del sitio.
 * Editar aquí datos de marca, contacto y correo — no se necesita tocar el resto del código.
 */

// Evita el acceso directo a este archivo si el servidor no está bien configurado.
if (!defined('SITE_ACCESS')) {
    define('SITE_ACCESS', true);
}

// ---------------------------------------------------------------------
// Identidad del sitio
// ---------------------------------------------------------------------
define('SITE_NAME', 'Los Dogos Originales');
define('SITE_SHORT_NAME', 'Los Dogos');
define('SITE_URL', 'https://losdogosoriginales.com');
define('SITE_TAGLINE', 'Es tiempo de dogos');
define('SITE_DESCRIPTION', 'Los Dogos Originales de Querétaro: más de 25 estilos de dogos artesanales. Sabor único, ingredientes frescos y calidad auténtica. Visítanos o pide franquicia.');
define('SITE_LOCALE', 'es_MX');
define('SITE_CITY', 'Querétaro, México');

// ---------------------------------------------------------------------
// Correos de contacto por departamento
// ---------------------------------------------------------------------
define('EMAIL_GENERAL', 'administracion@losdogosoriginales.com');
define('EMAIL_FRANQUICIAS', 'franquicias@losdogosoriginales.com');
define('EMAIL_TALENTO', 'talento@losdogosoriginales.com');
define('EMAIL_ADMINISTRACION', 'administracion@losdogosoriginales.com');

// Mapeo del <select> del formulario de contacto -> correo destino
define('CONTACT_ROUTES', [
    'general'        => EMAIL_GENERAL,
    'franquicias'     => EMAIL_FRANQUICIAS,
    'talento'         => EMAIL_TALENTO,
    'administracion'  => EMAIL_ADMINISTRACION,
]);

// ---------------------------------------------------------------------
// Redes sociales y contacto directo
// ---------------------------------------------------------------------
// TODO: actualizar con el número real (formato E.164 sin espacios, ej. 524421234567)
define('WHATSAPP_NUMBER', '');
define('SOCIAL_FACEBOOK', 'https://www.facebook.com/losdogosautenticos/');
define('SOCIAL_INSTAGRAM', 'https://www.instagram.com/losdogos_originales/');

// TODO: confirmar dirección y horario exactos de la sucursal
define('ADDRESS_LINE', 'Querétaro, Qro., México');
define('OPENING_HOURS', 'Lun a Dom · 13:00 – 22:00 hrs');

// TODO: pegar aquí el src del iframe de Google Maps para la sucursal
define('MAPS_EMBED_URL', '');

// ---------------------------------------------------------------------
// Envío de correo (formulario de contacto)
// ---------------------------------------------------------------------
// Si el hosting soporta SMTP autenticado (recomendado para evitar spam/carpeta
// de no deseados), instala PHPMailer con Composer (ver README) y activa esto:
define('MAIL_USE_SMTP', false);
define('SMTP_HOST', '');
define('SMTP_PORT', 587);
define('SMTP_USER', '');
define('SMTP_PASS', '');
define('SMTP_SECURE', 'tls'); // 'tls' o 'ssl'

// Remitente que verá el destinatario cuando MAIL_USE_SMTP esté activo
define('MAIL_FROM_EMAIL', 'no-responder@losdogosoriginales.com');
define('MAIL_FROM_NAME', SITE_NAME);

// ---------------------------------------------------------------------
// Zona horaria
// ---------------------------------------------------------------------
date_default_timezone_set('America/Mexico_City');
