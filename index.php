<?php
/**
 * Los Dogos Originales — Landing page
 * Punto de entrada: arranca sesión, carga configuración y compone la página
 * a partir de los includes en /includes.
 */

define('SITE_ACCESS', true);
session_start();

require_once __DIR__ . '/config.php';

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/intro.php';
require __DIR__ . '/includes/nav.php';

require __DIR__ . '/includes/sections/hero.php';
require __DIR__ . '/includes/sections/nosotros.php';
require __DIR__ . '/includes/sections/menu.php';
require __DIR__ . '/includes/sections/galeria.php';
require __DIR__ . '/includes/sections/franquicias.php';
require __DIR__ . '/includes/sections/ubicacion.php';
require __DIR__ . '/includes/sections/contacto.php';

require __DIR__ . '/includes/footer.php';
