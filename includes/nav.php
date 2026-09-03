<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<header class="site-header" id="site-header">
  <div class="container site-header__inner">
    <a href="#inicio" class="brand">
      <img src="/assets/img/logo/logo-los-dogos.png" alt="<?= htmlspecialchars(SITE_NAME) ?>" class="brand__logo">
    </a>

    <nav class="nav" id="main-nav">
      <ul class="nav__list">
        <li><a href="#inicio" class="nav__link">Inicio</a></li>
        <li><a href="#nosotros" class="nav__link">Nosotros</a></li>
        <li><a href="#especialidades" class="nav__link">Especialidades</a></li>
        <li><a href="#galeria" class="nav__link">Galería</a></li>
        <li><a href="#franquicias" class="nav__link">Franquicias</a></li>
        <li><a href="#talento" class="nav__link">Trabaja con Nosotros</a></li>
        <li><a href="#ubicacion" class="nav__link">Ubicación</a></li>
        <li><a href="#contacto" class="nav__link">Contacto</a></li>
      </ul>
    </nav>

    <a href="#contacto" class="btn btn--primary btn--sm nav__cta">Contáctanos</a>

    <button class="nav-toggle" id="nav-toggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="main-nav">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>
