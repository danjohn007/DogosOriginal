<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars(SITE_NAME) ?> · <?= htmlspecialchars(SITE_TAGLINE) ?></title>
<meta name="description" content="<?= htmlspecialchars(SITE_DESCRIPTION) ?>">
<meta name="theme-color" content="#0e0e10">
<link rel="canonical" href="<?= htmlspecialchars(SITE_URL) ?>">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars(SITE_NAME) ?> · <?= htmlspecialchars(SITE_TAGLINE) ?>">
<meta property="og:description" content="<?= htmlspecialchars(SITE_DESCRIPTION) ?>">
<meta property="og:url" content="<?= htmlspecialchars(SITE_URL) ?>">
<meta property="og:image" content="<?= htmlspecialchars(SITE_URL) ?>/assets/img/gallery/hero-bienvenida.jpg">
<meta property="og:locale" content="<?= htmlspecialchars(SITE_LOCALE) ?>">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars(SITE_NAME) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars(SITE_DESCRIPTION) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars(SITE_URL) ?>/assets/img/gallery/hero-bienvenida.jpg">

<!-- Favicons -->
<link rel="icon" type="image/x-icon" href="/assets/img/logo/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/logo/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/img/logo/favicon-16.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/logo/apple-touch-icon.png">

<!-- Fuentes -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/assets/css/style.css">

<!-- Datos estructurados para el restaurante -->
<script type="application/ld+json">
<?php
echo json_encode([
    '@context'      => 'https://schema.org',
    '@type'         => 'Restaurant',
    'name'          => SITE_NAME,
    'url'           => SITE_URL,
    'image'         => SITE_URL . '/assets/img/gallery/fachada-restaurante.jpg',
    'servesCuisine' => 'Hot dogs / Dogos artesanales',
    'priceRange'    => '$$',
    'address'       => [
        '@type'           => 'PostalAddress',
        'addressLocality' => 'Querétaro',
        'addressCountry'  => 'MX',
    ],
    'sameAs' => [SOCIAL_FACEBOOK, SOCIAL_INSTAGRAM],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>
</head>
<body>
