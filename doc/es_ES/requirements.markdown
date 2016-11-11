Requerimientos
===============

Lado del servidor
--------------------

### Sistemas operativos compatibles

| Sistemas operativos                  |
|--------------------------------------|
| Linux Ubuntu Xenial Xerus 16.04 LTS  |
| Linux Ubuntu Trusty 14.04 LTS        |
| Linux Centos 6.x                     |
| Linux Centos 7.x                     |
| Linux Redhat 6.x                     |
| Linux Redhat 7.x                     |
| Linux Debian 8                       |
| FreeBSD 10.x                         |
| Microsoft Windows 2012 R2            |
| Microsoft Windows 2008               |

### Base de datos compatibles

| Base de datos      |
|--------------------|
| Sqlite 3.x         |
| Mysql >= 5.5       |
| MariaDB >= 10      |
| Postgresql >= 9.3  |

Qu� base de datos para elegir?

| Tipo            | Uso                                              |
|-----------------|-----------------------------------------------------|
| Sqlite          | un solo usuario o equipo peque�o (casi no hay concurrencia)  |
| Mysql/Postgres  | Equipo grande, configuraci�n de alta disponibilidad       |

No usar Sqlite en montajes de NFS, use Sqlite solo cuando tengas un disco con Fast I/O

### Servidores Web Compatibles

| Servidores Web     |
|--------------------|
| Apache HTTP Server |
| Nginx              |
| Microsoft IIS      |

Kanboard esta pre configurado para trabajar con Apache (URL rewriting).

### Versiones de PHP

| Versi�n de PHP |
|----------------|
| PHP >= 5.3.9   |
| PHP 5.4        |
| PHP 5.5        |
| PHP 5.6        |
| PHP 7.x        |

### PHP Extensiones Requeridas

| PHP Extensiones Requeridas | Nota                          |
|----------------------------|-------------------------------|
| pdo_sqlite                 | Solo si usas Sqlite           |
| pdo_mysql                  | Solo si usas Mysql/MariaDB    |
| pdo_pgsql                  | Solo si usas Postgres      |
| gd                         |                               |
| mbstring                   |                               |
| openssl                    |                               |
| json                       |                               |
| hash                       |                               |
| ctype                      |                               |
| session                    |                               |
| ldap                       | Solamente para autenticaci�n LDAP |
| Zend OPcache               | Recomendado                |

### Extensiones PHP opcionales

| PHP Extensiones Requeridas | Nota                                       |
|----------------------------|--------------------------------------------|
| zip                        | Usado para instalar plugins desde Kanboard |

### Recomendaciones

- Usar sistemas operativos modernos de Linux o Unix.
- El mejor performace se obtienen con la �ltima versi�n de PHP junto con la operaci�n de OPcode esta activado.


Lado del cliente
----------------

### Browsers [Navegadores]

Siempre usar el navegador mas moderno o la ultima versi�n posible:

| Browser                               |
|---------------------------------------|
| Safari                                |
| Google Chrome                         |
| Mozilla Firefox                       |
| Microsoft Internet Explorer >= 11     |
| Microsoft Edge                        |

### Dispositivos

| Device            | Resoluci�n de la pantalla |
|-------------------|--------------------|
| Laptop o desktop  | >= 1366 x 768      |
| Tablet            | >= 1024 x 768      |

Kanboard a�n no est� optimizado para smartphones. Est� funcionando, pero la interfaz de usuario no es muy c�moda de usar.
