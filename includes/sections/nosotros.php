<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<section class="section" id="nosotros">
  <div class="container split">
    <div class="split__media reveal">
      <img src="/assets/img/gallery/fachada-restaurante.jpg" alt="Fachada de Los Dogos Originales en Querétaro" loading="lazy">
    </div>
    <div class="split__content reveal">
      <p class="eyebrow">Nuestra historia</p>
      <h2 class="section__title">Nacimos en Querétaro con una idea simple: hacer el mejor dogo de tu vida.</h2>
      <p class="section__text">
        En <?= htmlspecialchars(SITE_NAME) ?> creemos que un buen dogo se hace con calma, ingredientes de verdad y mucha
        actitud. Desde nuestra primera parrilla hasta hoy, cada receta se prueba, se ajusta y se perfecciona
        antes de llegar a tu pan.
      </p>
      <p class="section__text">
        Somos el lugar al que llegas por hambre y te quedas por la experiencia: patio, buena música y
        ese sabor único que solo lo original puede dar.
      </p>
      <div class="stat-row">
        <div class="stat">
          <span class="stat__number">25+</span>
          <span class="stat__label">Estilos de dogos</span>
        </div>
        <div class="stat">
          <span class="stat__number">100%</span>
          <span class="stat__label">Ingredientes frescos</span>
        </div>
        <div class="stat">
          <span class="stat__number">Qro</span>
          <span class="stat__label">Hecho en Querétaro</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="statement reveal">
  <div class="statement__media">
    <img src="/assets/img/gallery/hero-bienvenida.jpg" alt="Nuestro sabor único te espera — Los Dogos Originales" loading="lazy">
  </div>
</section>
