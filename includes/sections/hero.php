<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<section class="hero" id="inicio">
  <div class="hero__media">
    <img src="/assets/img/gallery/dogos-doble-relleno.jpg" alt="Dogos artesanales de Los Dogos Originales" loading="eager">
    <div class="hero__overlay"></div>
  </div>

  <div class="container hero__content">
    <p class="eyebrow reveal">Originales · Querétaro</p>
    <h1 class="hero__title reveal">El original.<br>El auténtico.</h1>
    <p class="hero__subtitle reveal">Más de 25 estilos de dogos artesanales, hechos con ingredientes frescos y el sabor que nos distingue desde el primer día.</p>
    <div class="hero__actions reveal">
      <a href="#especialidades" class="btn btn--primary">Ver especialidades</a>
      <a href="#ubicacion" class="btn btn--ghost">Visítanos</a>
    </div>
  </div>

  <a href="#nosotros" class="hero__scroll" aria-label="Bajar a la siguiente sección">
    <span></span>
  </a>
</section>
