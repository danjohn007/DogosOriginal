<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<footer class="site-footer">
  <div class="container footer__grid">

    <div class="footer__col footer__brand">
      <img src="/assets/img/logo/logo-los-dogos.png" alt="<?= htmlspecialchars(SITE_NAME) ?>" class="footer__logo">
      <p class="footer__tagline"><?= htmlspecialchars(SITE_TAGLINE) ?></p>
      <div class="footer__social">
        <a href="<?= htmlspecialchars(SOCIAL_FACEBOOK) ?>" target="_blank" rel="noopener" class="social-icon" data-tooltip="Facebook" aria-label="Facebook">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.5 1.49-3.89 3.78-3.89 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
        </a>
        <a href="<?= htmlspecialchars(SOCIAL_INSTAGRAM) ?>" target="_blank" rel="noopener" class="social-icon" data-tooltip="Instagram" aria-label="Instagram">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.72 3.72 0 0 1-1.38-.9 3.72 3.72 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07c-1.27.06-2.15.27-2.91.57a5.9 5.9 0 0 0-2.13 1.39A5.9 5.9 0 0 0 .62 4.16C.32 4.92.11 5.8.05 7.07.01 8.35 0 8.76 0 12s.01 3.65.07 4.93c.06 1.27.27 2.15.57 2.91.31.79.72 1.46 1.39 2.13a5.9 5.9 0 0 0 2.13 1.39c.76.3 1.64.51 2.91.57 1.28.06 1.69.07 4.93.07s3.65-.01 4.93-.07c1.27-.06 2.15-.27 2.91-.57a5.9 5.9 0 0 0 2.13-1.39 5.9 5.9 0 0 0 1.39-2.13c.3-.76.51-1.64.57-2.91.06-1.28.07-1.69.07-4.93s-.01-3.65-.07-4.93c-.06-1.27-.27-2.15-.57-2.91a5.9 5.9 0 0 0-1.39-2.13A5.9 5.9 0 0 0 19.84.64c-.76-.3-1.64-.51-2.91-.57C15.65.01 15.24 0 12 0z"/><path d="M12 5.84A6.16 6.16 0 1 0 18.16 12 6.16 6.16 0 0 0 12 5.84zm0 10.16A4 4 0 1 1 16 12a4 4 0 0 1-4 4zM18.41 4.15a1.44 1.44 0 1 0 1.44 1.44 1.44 1.44 0 0 0-1.44-1.44z"/></svg>
        </a>
      </div>
    </div>

    <div class="footer__col">
      <h3 class="footer__heading">Navegación</h3>
      <ul class="footer__links">
        <li><a href="#nosotros">Nosotros</a></li>
        <li><a href="#especialidades">Especialidades</a></li>
        <li><a href="#galeria">Galería</a></li>
        <li><a href="#ubicacion">Ubicación</a></li>
      </ul>
    </div>

    <div class="footer__col">
      <h3 class="footer__heading">Oportunidades</h3>
      <ul class="footer__links">
        <li><a href="#franquicias">Franquicias</a></li>
        <li><a href="#talento">Trabaja con nosotros</a></li>
        <li><a href="mailto:<?= htmlspecialchars(EMAIL_FRANQUICIAS) ?>"><?= htmlspecialchars(EMAIL_FRANQUICIAS) ?></a></li>
        <li><a href="mailto:<?= htmlspecialchars(EMAIL_TALENTO) ?>"><?= htmlspecialchars(EMAIL_TALENTO) ?></a></li>
      </ul>
    </div>

    <div class="footer__col">
      <h3 class="footer__heading">Contacto</h3>
      <ul class="footer__links">
        <li><a href="mailto:<?= htmlspecialchars(EMAIL_ADMINISTRACION) ?>"><?= htmlspecialchars(EMAIL_ADMINISTRACION) ?></a></li>
        <li><?= htmlspecialchars(ADDRESS_LINE) ?></li>
        <li><?= htmlspecialchars(OPENING_HOURS) ?></li>
      </ul>
    </div>

  </div>

  <div class="footer__bottom">
    <div class="container footer__bottom-inner">
      <p>&copy; <?= date('Y') ?> <?= htmlspecialchars(SITE_NAME) ?>. Todos los derechos reservados.</p>
      <p><?= htmlspecialchars(SITE_CITY) ?></p>
    </div>
  </div>
</footer>

<a href="#inicio" class="back-to-top" id="back-to-top" aria-label="Volver arriba">↑</a>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
