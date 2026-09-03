<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<section class="section" id="contacto">
  <div class="container">
    <div class="section__head reveal">
      <p class="eyebrow">Contacto</p>
      <h2 class="section__title">Hablemos</h2>
      <p class="section__text">
        ¿Dudas, pedidos, franquicias o quieres unirte al equipo? Escríbenos y te respondemos lo antes posible.
      </p>
    </div>

    <form id="contact-form" class="contact-form reveal" novalidate>
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

      <!-- Honeypot anti-spam, oculto para personas -->
      <div class="hp-field" aria-hidden="true">
        <label for="website">Sitio web</label>
        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
      </div>

      <div class="form-row">
        <div class="form-field">
          <label for="name">Nombre</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-field">
          <label for="email">Correo</label>
          <input type="email" id="email" name="email" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label for="phone">Teléfono (opcional)</label>
          <input type="tel" id="phone" name="phone">
        </div>
        <div class="form-field">
          <label for="department">Departamento</label>
          <select id="department" name="department">
            <option value="general">Información general</option>
            <option value="franquicias">Franquicias</option>
            <option value="talento">Trabaja con nosotros</option>
            <option value="administracion">Administración</option>
          </select>
        </div>
      </div>

      <div class="form-field">
        <label for="message">Mensaje</label>
        <textarea id="message" name="message" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn btn--primary" id="contact-submit">Enviar mensaje</button>

      <p class="form-feedback" id="form-feedback" role="status" aria-live="polite"></p>
    </form>
  </div>
</section>
