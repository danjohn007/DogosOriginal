<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<section class="section section--dark" id="especialidades">
  <div class="container">
    <div class="section__head reveal">
      <p class="eyebrow">Especialidades</p>
      <h2 class="section__title">Más de 25 estilos, un solo original</h2>
      <p class="section__text">
        De los clásicos que nunca fallan a las combinaciones que solo encuentras aquí. Camarón, pepperoni,
        tocino, quesos fundidos y toppings que llevan nuestra receta al siguiente nivel.
      </p>
    </div>

    <div class="feature-banner reveal">
      <img src="/assets/img/gallery/variedad-dogos.jpg" alt="Variedad de dogos: camarón, pepperoni y especial de la casa" loading="lazy">
    </div>

    <div class="menu-grid">
      <article class="menu-card reveal">
        <div class="menu-card__media">
          <img src="/assets/img/gallery/dogo-toppings-especial.jpg" alt="Dogo especial con aros de cebolla, papas y bebidas" loading="lazy">
        </div>
        <div class="menu-card__body">
          <h3>Dogo Especial de la Casa</h3>
          <p>Salchicha premium, aros de cebolla crujientes, mayo y nuestra salsa BBQ de la casa. Servido con papas.</p>
        </div>
      </article>

      <article class="menu-card reveal">
        <div class="menu-card__media">
          <img src="/assets/img/gallery/dogo-clasico-detalle.jpg" alt="Dogos envueltos en papel de la marca Los Dogos Originales" loading="lazy">
        </div>
        <div class="menu-card__body">
          <h3>Dogo Original</h3>
          <p>La receta que nos dio nombre: vegetales salteados, especias de la casa y ese sabor inconfundible.</p>
        </div>
      </article>

      <article class="menu-card reveal">
        <div class="menu-card__media">
          <img src="/assets/img/gallery/dogos-doble-relleno.jpg" alt="Dogos dobles con toppings gourmet y papas a la francesa" loading="lazy">
        </div>
        <div class="menu-card__body">
          <h3>Dogos Gourmet</h3>
          <p>Quesos fundidos, carnes al carbón y toques frescos de cilantro y cebolla. Para los que piden doble.</p>
        </div>
      </article>
    </div>
  </div>
</section>
