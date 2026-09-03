<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<section class="section section--split-cta" id="franquicias">
  <div class="container split split--reverse">
    <div class="split__content reveal">
      <p class="eyebrow">Franquicias</p>
      <h2 class="section__title">Lleva el original a tu ciudad</h2>
      <p class="section__text">
        <?= htmlspecialchars(SITE_NAME) ?> está creciendo y buscamos socios que compartan nuestra pasión por
        el sabor auténtico. Si quieres abrir una franquicia, escríbenos y te compartimos el modelo de negocio,
        inversión y todo lo que necesitas saber para empezar.
      </p>
      <a href="mailto:<?= htmlspecialchars(EMAIL_FRANQUICIAS) ?>" class="btn btn--primary">
        Escríbenos a <?= htmlspecialchars(EMAIL_FRANQUICIAS) ?>
      </a>
    </div>
    <div class="split__media split__media--stat reveal">
      <div class="cta-card">
        <span class="cta-card__number">25+</span>
        <span class="cta-card__label">estilos de dogos listos para replicar tu propia sucursal</span>
      </div>
    </div>
  </div>
</section>

<section class="section section--split-cta" id="talento">
  <div class="container split">
    <div class="split__media split__media--stat reveal">
      <div class="cta-card cta-card--alt">
        <span class="cta-card__number">Únete</span>
        <span class="cta-card__label">a un equipo que cree en hacer las cosas con actitud y sabor</span>
      </div>
    </div>
    <div class="split__content reveal">
      <p class="eyebrow">Trabaja con nosotros</p>
      <h2 class="section__title">Súmate al equipo de Los Dogos</h2>
      <p class="section__text">
        Buscamos gente con actitud, ganas de aprender y pasión por el buen servicio. Manda tu CV y cuéntanos
        por qué quieres ser parte del equipo.
      </p>
      <a href="mailto:<?= htmlspecialchars(EMAIL_TALENTO) ?>" class="btn btn--primary">
        Envía tu CV a <?= htmlspecialchars(EMAIL_TALENTO) ?>
      </a>
    </div>
  </div>
</section>
