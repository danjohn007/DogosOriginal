<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}

$gallery = [
    ['src' => '/assets/img/gallery/fachada-restaurante.jpg', 'alt' => 'Terraza y fachada de Los Dogos Originales'],
    ['src' => '/assets/img/gallery/dogos-doble-relleno.jpg', 'alt' => 'Dogos servidos en canasta con papas'],
    ['src' => '/assets/img/gallery/variedad-dogos.jpg', 'alt' => 'Variedad de dogos de la casa'],
    ['src' => '/assets/img/gallery/dogo-toppings-especial.jpg', 'alt' => 'Dogo especial con aros de cebolla y papas'],
    ['src' => '/assets/img/gallery/dogo-clasico-detalle.jpg', 'alt' => 'Detalle de dogos envueltos en papel de marca'],
    ['src' => '/assets/img/gallery/hero-bienvenida.jpg', 'alt' => 'Los Dogos Originales — nuestro sabor único te espera'],
];
?>
<section class="section" id="galeria">
  <div class="container">
    <div class="section__head reveal">
      <p class="eyebrow">Galería</p>
      <h2 class="section__title">Un vistazo a lo que nos hace originales</h2>
    </div>

    <div class="gallery-grid">
      <?php foreach ($gallery as $item): ?>
        <div class="gallery-item reveal">
          <img src="<?= htmlspecialchars($item['src']) ?>" alt="<?= htmlspecialchars($item['alt']) ?>" loading="lazy">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
