<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<section class="section section--dark" id="ubicacion">
  <div class="container split">
    <div class="split__content reveal">
      <p class="eyebrow">Ubicación</p>
      <h2 class="section__title">Te esperamos en Querétaro</h2>
      <p class="section__text"><?= htmlspecialchars(ADDRESS_LINE) ?></p>
      <p class="section__text"><strong>Horario:</strong> <?= htmlspecialchars(OPENING_HOURS) ?></p>

      <?php if (WHATSAPP_NUMBER !== ''): ?>
        <a href="https://wa.me/<?= htmlspecialchars(WHATSAPP_NUMBER) ?>" class="btn btn--primary" target="_blank" rel="noopener">
          Pide por WhatsApp
        </a>
      <?php else: ?>
        <a href="#contacto" class="btn btn--primary">Contáctanos para tu pedido</a>
      <?php endif; ?>
    </div>

    <div class="split__media reveal">
      <?php if (MAPS_EMBED_URL !== ''): ?>
        <iframe class="map-embed" src="<?= htmlspecialchars(MAPS_EMBED_URL) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
      <?php else: ?>
        <img src="/assets/img/gallery/fachada-restaurante.jpg" alt="Ubicación de Los Dogos Originales" loading="lazy">
      <?php endif; ?>
    </div>
  </div>
</section>
