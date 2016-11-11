Autenticaci�n por proxy inverso
============================

Este metodo de autenticaci�n a menudo es usado por [SSO](http://en.wikipedia.org/wiki/Single_sign-on) (Single Sign-On) especialmente para organizaciones mayores.

La autenticaci�n se realiza mediante otro sistema, Kanboard no conoce su contrase�a y supongamos que ya est� autenticado.

Requerimentos
------------

- Un proxy inverso bien configurado

o

- Apache Auth en el mismo servidor


�Como funciona esto?
-------------------

1. Su proxy inverso autentica al usuario y envia el nombre de usuario a trav�s de una cabecera HTTP.
2. Kanboard recuperar el nombre de usuario de la solicitud
    - El usuario se crea autom�ticamente si es necesario
    - Abrir una nueva sesi�n Kanboard sin ning�n s�mbolo asumiendo que es v�lida

Instrucciones de instalaci�n
----------------------------

### Configuraci�n de su proxy inverso

Esto esta fuera del alcance de esta documentaci�n.
Deber�a comprobar la conexi�n del usuario ya que es enviado por el proxy inverso utilizando una cabecera HTTP.

### Configuraci�n de Kanboard

Crear un archivo `config.php`  copiar el archivo` config.default.php`:

```php
<?php

// Activar / desactivar la autenticaci�n del proxy inverso
define('REVERSE_PROXY_AUTH', true); // Set this value to true

// La cabecera HTTP para recuperar. Si no se especifica, el valor por defecto es REMOTE_USER
define('REVERSE_PROXY_USER_HEADER', 'REMOTE_USER');

// El Kanboard predeterminado esta el administrador para su organizaci�n.
// Ya que todo debe ser filtrada por el proxy inverso,
// Debe tener un usuario administrador para el arranque.
define('REVERSE_PROXY_DEFAULT_ADMIN', 'myadmin');

// El dominio predeterminado para asumir la direcci�n de correo electr�nico.
// En caso de que el nombre de usuario no es una direcci�n de correo electr�nico,
// Se actualizar� autom�ticamente como USER@mydomain.com
define('REVERSE_PROXY_DEFAULT_DOMAIN', 'mydomain.com');
```

Notas:

- Si el proxy esta en el mismo servidor Web que ejecuta Kanboard, seg�n la [CGI protocol](http://www.ietf.org/rfc/rfc3875) el Header ser� `REMOTE_USER`. Por ejemplo, Apache a�adir `REMOTE_USER` por defecto si` Require valid-usuario de la red se establece.

- Si Apache es un proxy inverso a otro Apache corriendo Kanboard, la cabecera `REMOTE_USER` no se establece (mismo comportamiento con IIS y Nginx)

- Si tu tienes un autentico reverse proxy, the [HTTP ICAP draft](http://tools.ietf.org/html/draft-stecher-icap-subid-00#section-3.4) proposes the header to be `X-Authenticated-User`. This de facto standard has been adopted by a number of tools.
