Preguntas frecuentes
==========================

Tu puedes recomendar un proveedor de web hosting para Kanboard?
---------------------------------------------------------------

Kanboard funciona bien con cualquier VPS proveedor de hosting como [Digital Ocean](https://www.digitalocean.com/?refcode=4b541f47aae4),
[Linode](https://www.linode.com/?r=4e381ac8a61116f40c60dc7438acc719610d8b11) o [Gandi](https://www.gandi.net/).

Para tener el mejor performance , elegir un proveedor con el disco r�pido de I/O porque Kanboard utilizar SQLite de forma predeterminada .
Evitar los proveedores de alojamiento que utilizan un punto de montaje NFS compartido.


Me sale una p�gina en blanco despu�s de instalar o actualizar Kanboard
----------------------------------------------------------------------

- Verificar si tienes instalados todos los requerimientos en tu servidor
- Verificar el log de errores de PHP y Apache
- Verificar si los archivos tienen los permisos correctos
- Si utiliza un agresivo OPcode caching, haz un reload a tu  web-server o php-fpm


Si Tienes el error "No hay CSPRNG adecuado instalado en su sistema "
-----------------------------------------------------------------------

Si tu usas PHP < 7.0, Tu necesitas tener la extensi�n openssl habilitada o `/dev/urandom`  accesible desde la aplicaci�n si se
restringe por un `open_basedir` 


P�gina no encontrada y la URL parece mal (&amp;amp;)
--------------------------------------------------

- La URL se mira como `/?controller=auth&amp;action=login&amp;redirect_query=` instanciada de `?controller=auth&action=login&redirect_query=`
- Kanboard regresa el error "Page not found"

Este problema proviene de la configuraci�n de PHP , el valor de ` arg_separator.output` no es defecto del PHP , hay diferentes maneras de solucionar que:

Cambiar el valor directamente en su ` php.ini` si es posible :

`` `
arg_separator.output = "& "
`` `

Sustituir el valor con un ` .htaccess` :

`` `
arg_separator.output php_value "& "
`` `

De lo contrario Kanboard tratar� de anular el valor directamente en PHP .


Error de autenticaci�n con la API y Apache + PHP - FPM
--------------------------------------------------------

Php-cgi bajo Apache HTTP basico no pasa user/pass forma predeterminada .
Para que esta soluci�n funcione , a�adir estas l�neas a su archivo ` .htaccess` :

```
RewriteCond %{HTTP:Authorization} ^(.+)$
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
```


Problemas conocidos con eAccelerator
------------------------------

Kanboard no funciona muy bien con [eAccelerator](http://eaccelerator.net).
El problema puede ser causado una p�gina en blanco o un accidente de Apache :

```
[Wed Mar 05 21:36:56 2014] [notice] child pid 22630 exit signal Segmentation fault (11)
```

La mejor manera de evitar este problema es desactivar eAccelerator o definir manualmente los archivos que desea almacenar en cach� con el par�metro de configuraci�n ` eaccelerator.filter` .

The project [eAccelerator parece muerto y no se actualiza desde 2012](https://github.com/eaccelerator/eaccelerator/commits/master).
Recomendamos para cambiar a la ultima versi�n de PHP por que el bundled viene con [OPcache](http://php.net/manual/en/intro.opcache.php).


Por que el requerimiento minimo es PHP 5.3.3?
-----------------------------------------

Kanboard utiliza la funcion `password_hash()` para encriptar los passwords pero solo esta disponible ne la version PHP >= 5.5.

Sin embargo, hay un back-port para [versiones de php anteriores](https://github.com/ircmaxell/password_compat#requirements).
Esta biblioteca requiere al menos PHP 5.3.7 para que funcione correctamente.

Al parecer , CentOS y Debian tienen parches de seguridad en su back-port para PHP 5.3.3 y al parecer estan  bien.

Kanboard v1.0.10 y v1.0.11 requiere al menos PHP 5.3.7 , pero este cambio se ha vuelto a ser compatible con PHP 5.3.3 con Kanboard > = v1.0.12


C�mo probar Kanboard con el PHP incorporado en el servidor web?
---------------------------------------------------------------

Si tu no quieres instalar un servidor web como Apache en tu localhost, tu puedes testearlo con el [servidor web embebido de PHP](http://www.php.net/manual/en/features.commandline.webserver.php):

```bash
unzip kanboard-VERSION.zip
cd kanboard
php -S localhost:8000
open http://localhost:8000/
```


Como instalar Kanboard en Yunohost?
------------------------------------

[YunoHost](https://yunohost.org/) es un sistema operativo de servidor con el objetivo de hacer auto-alojamiento accesible para todos.

Existe un [paquete para instalar Kanboard en Yunohost facilmente](https://github.com/mbugeia/kanboard_ynh).


�D�nde puedo encontrar una lista de proyectos relacionados?
--------------------------------------------

- [Kanboard API python client by @freekoder](https://github.com/freekoder/kanboard-py)
- [Kanboard Presenter by David Eberlein](https://github.com/davideberlein/kanboard-presenter)
- [CSV2Kanboard by @ashbike](https://github.com/ashbike/csv2kanboard)
- [Kanboard for Yunohost by @mbugeia](https://github.com/mbugeia/kanboard_ynh)
- [Trello import script by @matueranet](https://github.com/matueranet/kanboard-import-trello)
- [Chrome extension by Timo](https://chrome.google.com/webstore/detail/kanboard-quickmenu/akjbeplnnihghabpgcfmfhfmifjljneh?utm_source=chrome-ntp-icon), [Source code](https://github.com/BlueTeck/kanboard_chrome_extension)
- [Python client script by @dzudek](https://gist.github.com/fguillot/84c70d4928eb1e0cb374)
- [Shell script for SQLite to MySQL/MariaDB migration by @oliviermaridat](https://github.com/oliviermaridat/kanboard-sqlite2mysql)
- [Git hooks for integration with Kanboard by Gene Pavlovsky](https://github.com/gene-pavlovsky/kanboard-git-hooks)


�Hay algunos tutoriales sobre Kanboard en otro idioma?
-----------------------------------------------------------

- [Art�culo serie alemana sobre Kanboard](http://demaya.de/wp/2014/07/kanboard-eine-jira-alternative-im-detail-installation/)
