<?php
if (!defined('SITE_ACCESS')) {
    http_response_code(403);
    exit('Acceso directo no permitido.');
}
?>
<div class="intro-overlay" id="intro-overlay" aria-hidden="true">
  <span class="intro-slash intro-slash--a"></span>
  <span class="intro-slash intro-slash--b"></span>
  <span class="intro-slash intro-slash--c"></span>
  <span class="intro-logo-stage">
    <span class="intro-logo">
      <img src="/assets/img/logo/logo-los-dogos.png" alt="" width="240" height="155" fetchpriority="high">
    </span>
  </span>
</div>
<script>document.documentElement.classList.add('is-intro-active');</script>
