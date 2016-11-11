Arquitectura de autenticaci�n
=============================

Kanboard provee una flexible y conectable arquitectura de autenticaci�n.

Por default, el usuario puede autenticarse con multiple metodos:

- Autenticaci�n por usuario y password (Base de datos local y LDAP)
- Autenticaci�n OAuth2 
- Autenticaci�n Reverse-Proxy
- Autenticaci�n basada en Cookie  (Recuerdame)

Adem�s, despues de una autenticaci�n satisfactoria un puede hacerse post de autenticaci�n Two-Factor .
Kanboard sopoarta nativamente el standart TOTP.

Interfaces de autenticaci�n
----------------------------

Para tener un sistema conectable, los drivers de autenticaci�n deben implementar un conjunto de interfaces

| Interface                                | Rol                                                          |
|------------------------------------------|------------------------------------------------------------------|
| AuthenticationProviderInterface          | Interface base para otras interfaces de autenticaci�n            |
| PreAuthenticationProviderInterface       | The user is already authenticated al alcanzar la aplicaci�n, Usualmente los servidores web definen algunas variables de entorno |
| PasswordAuthenticationProviderInterface  | El metodo de autenticaci�n que usa el username y password provienen del formulario de login |
| OAuthAuthenticationProviderInterface     | Proveedores OAuth2   |
| PostAuthenticationProviderInterface      | Drivers de autenticaci�n Two-Factor ,pide el c�digo a confirmar      |
| SessionCheckProviderInterface            | Los proveedores que son capaces de comprobar si la sesi�n de usuario es v�lida        |

### Ejemplos de autenticaci�n de proveedores:

- Database por default metodos a implementar `PasswordAuthenticationProviderInterface` y `SessionCheckProviderInterface`
- Reverse-Proxy metodos a implementar `PreAuthenticationProviderInterface` y `SessionCheckProviderInterface`
- Google metodos a implementar `OAuthAuthenticationProviderInterface`
- LDAP metodos a implementar `PasswordAuthenticationProviderInterface`
- RememberMe cookie metodos a implementar `PreAuthenticationProviderInterface`
- Two-Factor TOTP metodos a implementar `PostAuthenticationProviderInterface`

flujo de trabajo de autenticaci�n ** Workflow **
------------------------------------------------

Para cada peticion HTTP:

1. Si la sesi�n de usuario esta abierta, ejecuta el registro de proveedores que implementa`SessionCheckProviderInterface`
2. Ejecuta todos los proveedores que implementa `PreAuthenticationProviderInterface`
3. Si el usuario final hace un submit al formulario del login, Los proveedores que implementa `PasswordAuthenticationProviderInterface` are executed
4. Si el usuario final quiere usar OAuth2, el selecciona el proveedor a ejecutar
5. Despues de una autenticaci�n satisfactoria, el ultimo registro utilizar� `PostAuthenticationProviderInterface`
6. Sincronizar la informaci�n del usuario si es necesario

Este workflow es manejado por la clase `Kanboard\Core\Security\AuthenticationManager`.

Eventos disparados:

- `AuthenticationManager::EVENT_SUCCESS`: autenticaci�n satisfactoria
- `AuthenticationManager::EVENT_FAILURE`: autenticaci�n fallida

Cada vez que se produce un evento de fallo , el contador de intentos fallidos se incrementa.

La cuenta de usuario se puede bloquear para el per�odo de tiempo configurado y un captcha puede ser mostrado para evitar ataques de fuerza bruta .

Interface de usuario del proveedor
---------------------------------

Cuando la autenticaci�n es satisfactoria, la `AuthenticationManager` pedura la informaci�n del usuario para que el driver llame al metodo `getUser()`.
Este metodo debe regresar un objeto que implementa la interface `Kanboard\Core\User\UserProviderInterface`.

Esta clase abstracta reune la informaci�n dede otro sistema.

Ejemplos :

- `DatabaseUserProvider` proporciona informaci�n para un usuario interno
- `LdapUserProvider` para un usuario LDAP
- `ReverseProxyUserProvider` para un usuario Reverse-Proxy
- `GoogleUserProvider` represtan un usuario de Google

Los m�todos para la interface del proveedor de Usuario:

- `isUserCreationAllowed()`: Regresa true para permitir la creaci�n autom�tica de usuarios
- `getExternalIdColumn()`: Obtener Identificaci�n del nombre de la columna externa (google_id, github_id, gitlab_id...)
- `getInternalId()`: Obtener el id interno de la base de datos
- `getExternalId()`: Obtener el id externo(Unique id)
- `getRole()`: Obtener el rol de usuario
- `getUsername()`: Obtener en nombre de usuario ** username **
- `getName()`: Obtener nombre completo del usuario
- `getEmail()`: Obtener el correo electronico del usuario
- `getExternalGroupIds()`: Obtiene los ids externos del grupo, autom�ticamente sincroniza la membresia del grupo y la presenta
- `getExtraAttributes()`: Obtiene los atributos extras para ser mostrados a el usuario durante la sincronizaci�n local

No es obligatorio que el metodo devuelva un valor.

Sincronizaci�n de un usuario local
----------------------------------

La informaci�n del usuario puede ser sincronizada autom�ticamente con la base de datos local.

- Si el metodo`getInternalId()` regresa un valor no realiza la sincronizaci�n
- Los metodos `getExternalIdColumn()` y `getExternalId()` debe regresar un valor para sincronizar el usuario
- Las propiedades que regresan un ** String ** vacios no se sincronizan
