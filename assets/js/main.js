(function () {
  'use strict';

  // -----------------------------------------------------------------
  // Animación de entrada: quita el overlay y libera el scroll
  // -----------------------------------------------------------------
  var introOverlay = document.getElementById('intro-overlay');
  if (introOverlay) {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var releaseIntro = function () {
      document.documentElement.classList.remove('is-intro-active');
      if (introOverlay && introOverlay.parentNode) introOverlay.parentNode.removeChild(introOverlay);
    };

    if (reduceMotion) {
      releaseIntro();
    } else {
      window.setTimeout(releaseIntro, 1950);
    }
  }

  // -----------------------------------------------------------------
  // Header sólido al hacer scroll
  // -----------------------------------------------------------------
  var header = document.getElementById('site-header');
  var backToTop = document.getElementById('back-to-top');

  function onScroll() {
    var scrolled = window.scrollY > 40;
    if (header) header.classList.toggle('is-scrolled', scrolled);
    if (backToTop) backToTop.classList.toggle('is-visible', window.scrollY > 600);
  }
  document.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // -----------------------------------------------------------------
  // Menú móvil
  // -----------------------------------------------------------------
  var toggle = document.getElementById('nav-toggle');
  var nav = document.getElementById('main-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('is-open');
      toggle.classList.toggle('is-open', isOpen);
      toggle.setAttribute('aria-expanded', String(isOpen));
    });

    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        toggle.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // -----------------------------------------------------------------
  // Animaciones al hacer scroll (reveal)
  // -----------------------------------------------------------------
  var revealItems = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealItems.length) {
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -60px 0px' }
    );
    revealItems.forEach(function (el) { observer.observe(el); });
  } else {
    revealItems.forEach(function (el) { el.classList.add('is-visible'); });
  }

  // -----------------------------------------------------------------
  // Formulario de contacto (envío por fetch, con fallback accesible)
  // -----------------------------------------------------------------
  var form = document.getElementById('contact-form');
  var feedback = document.getElementById('form-feedback');
  var submitBtn = document.getElementById('contact-submit');

  if (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      var originalLabel = submitBtn.textContent;
      submitBtn.disabled = true;
      submitBtn.textContent = 'Enviando...';
      feedback.textContent = '';
      feedback.className = 'form-feedback';

      fetch('/mail/contact-handler.php', {
        method: 'POST',
        body: new FormData(form),
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          feedback.textContent = data.message || '';
          feedback.classList.add(data.success ? 'is-success' : 'is-error');
          if (data.success) form.reset();
        })
        .catch(function () {
          feedback.textContent = 'No pudimos enviar tu mensaje. Intenta de nuevo o escríbenos directo por correo.';
          feedback.classList.add('is-error');
        })
        .finally(function () {
          submitBtn.disabled = false;
          submitBtn.textContent = originalLabel;
        });
    });
  }
})();
