# Los Dogos Originales — Landing Page

Landing page para **Los Dogos Originales** (Querétaro). Estilo minimalista y
premium, construida con HTML + CSS + JS + PHP, pensada para desplegarse en
`https://losdogosoriginales.com`.

## Estructura del proyecto

```
.
├── index.php                  # Punto de entrada: arma la página con los includes
├── config.php                 # Configuración central (correos, redes, SMTP, mapa)
├── .htaccess                  # HTTPS forzado, cabeceras de seguridad, caché
├── robots.txt / sitemap.xml
├── composer.json              # Dependencia opcional: PHPMailer (SMTP)
│
├── assets/
│   ├── css/style.css          # Todo el estilo del sitio
│   ├── js/main.js             # Menú móvil, scroll, animaciones, envío del form
│   └── img/
│       ├── logo/              # Logo (PDF original + PNG + favicons generados)
│       └── gallery/           # Fotografía del restaurante, ya optimizada para web
│
├── includes/
│   ├── header.php             # <head>, metadatos, SEO, Open Graph
│   ├── nav.php                # Header/nav con logo y menú
│   ├── footer.php             # Footer, redes sociales, cierre de </html>
│   └── sections/               # Una sección = un archivo
│       ├── hero.php
│       ├── nosotros.php
│       ├── menu.php            # "Especialidades"
│       ├── galeria.php
│       ├── franquicias.php     # Incluye también la sección "Trabaja con nosotros"
│       ├── ubicacion.php
│       └── contacto.php
│
└── mail/
    ├── mailer.php              # Envío de correo (PHPMailer/SMTP o mail() nativo)
    └── contact-handler.php     # Procesa el POST del formulario y enruta por departamento
```

Cada sección vive en su propio archivo dentro de `includes/sections/`, así que
agregar, quitar o reordenar bloques de la página es tan simple como editar
`index.php`.

## Correos de contacto

El formulario de contacto tiene un selector de "Departamento" que enruta el
mensaje automáticamente:

| Departamento         | Correo destino                          |
|-----------------------|------------------------------------------|
| Información general   | administracion@losdogosoriginales.com   |
| Franquicias            | franquicias@losdogosoriginales.com      |
| Trabaja con nosotros   | talento@losdogosoriginales.com          |
| Administración         | administracion@losdogosoriginales.com   |

Esto se configura en `config.php` (constante `CONTACT_ROUTES`) — cambiar un
correo ahí actualiza automáticamente el formulario, el footer y los enlaces
`mailto:` de "Franquicias" y "Trabaja con nosotros".

## Datos pendientes por completar (`config.php`)

Antes de publicar, revisa y llena estos valores en `config.php`:

- `WHATSAPP_NUMBER` — número en formato `52...` para el botón "Pide por WhatsApp".
- `ADDRESS_LINE` / `OPENING_HOURS` — dirección y horario exactos de la sucursal.
- `MAPS_EMBED_URL` — URL del `<iframe>` de Google Maps para la sección Ubicación.
- `SOCIAL_FACEBOOK` / `SOCIAL_INSTAGRAM` — ya están precargados con
  `losdogosoriginales`, confirma que sean los links correctos.

## Envío de correo: mail() nativo vs. SMTP (PHPMailer)

Por defecto el formulario usa la función `mail()` de PHP, que funciona en la
mayoría de hostings compartidos sin configuración extra.

Para mayor entregabilidad (evitar spam) se recomienda SMTP autenticado:

```bash
composer install
```

Luego en `config.php`:

```php
define('MAIL_USE_SMTP', true);
define('SMTP_HOST', 'smtp.tudominio.com');
define('SMTP_USER', 'no-responder@losdogosoriginales.com');
define('SMTP_PASS', '********');
```

Si `vendor/` no existe o `MAIL_USE_SMTP` está en `false`, el sitio cae
automáticamente a `mail()` nativo — no hay que tocar código para que funcione.

## Despliegue

1. Sube todo el contenido del repo a la raíz pública del hosting (donde
   `losdogosoriginales.com` apunte).
2. Confirma que el hosting tenga **PHP 8.0+** habilitado.
3. Si vas a usar SMTP, corre `composer install` en el servidor (o sube la
   carpeta `vendor/` ya generada).
4. Verifica que `mod_rewrite`, `mod_headers`, `mod_deflate` y `mod_expires`
   estén activos en Apache para que `.htaccess` funcione completo (si el
   hosting usa Nginx, estas reglas deben migrarse a la configuración del
   servidor).
5. Prueba el formulario de contacto en producción: al enviarlo deberías
   recibir el correo en la bandeja del departamento seleccionado.

## Desarrollo local

Con PHP instalado localmente:

```bash
php -S localhost:8000
```

Y abre `http://localhost:8000`.
