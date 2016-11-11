Desarrollo de Plugin 
====================

Nota : el plugin API es **considerado alpha** en estos momentos.

Los plugins son �tiles para extender las funcionalidades b�sicas de Kanboard , la adici�n de caracter�sticas , la creaci�n de temas o cambiar el comportamiento por defecto .

Los creadores de plugins deben especificar expl�citamente las versiones compatibles de Kanboard . El c�digo interno de Kanboard puede cambiar con el tiempo y su extensi�n debe ser probado con nuevas versiones . Compruebe siempre el [ChangeLog](https://github.com/kanboard/kanboard/blob/master/ChangeLog) para realizar los cambios.

- [Crear tu plugin](plugin-registration.markdown)
- [Usar plugins hooks](plugin-hooks.markdown)
- [Eventos](plugin-events.markdown)
- [Rescribir compartamientos por default en la aplicaci�n](plugin-overrides.markdown)
- [Agregar plugins para migrar esquemas](plugin-schema-migrations.markdown)
- [Personalizar rutas](plugin-routes.markdown)
- [Agregar helpers](plugin-helpers.markdown)
- [Agregar trasportes de email ](plugin-mail-transports.markdown)
- [Agregar tipos de notificaciones](plugin-notifications.markdown)
- [Agregar acciones automaticas](plugin-automatic-actions.markdown)
- [Adjuntar metados para usuarios,tareas y proyectos](plugin-metadata.markdown)
- [Arquitectura de autenticaci�n](plugin-authentication-architecture.markdown)
- [Registraci�n de plugins de autenticaci�n](plugin-authentication.markdown)
- [Arquitectura de autorizaci�n](plugin-authorization-architecture.markdown)
- [Personlizar grupos de proveedores](plugin-group-provider.markdown)
- [Links externos para proveedores](plugin-external-link.markdown)
- [Agregar avatar a proveedores](plugin-avatar-provider.markdown)
- [Cliente LDAP](plugin-ldap-client.markdown)

Ejemplos de plugins
-------------------

- [SMS Two-Factor Authentication](https://github.com/kanboard/plugin-sms-2fa)
- [Reverse-Proxy Authentication with LDAP support](https://github.com/kanboard/plugin-reverse-proxy-ldap)
- [Slack](https://github.com/kanboard/plugin-slack)
- [Hipchat](https://github.com/kanboard/plugin-hipchat)
- [Jabber](https://github.com/kanboard/plugin-jabber)
- [Sendgrid](https://github.com/kanboard/plugin-sendgrid)
- [Mailgun](https://github.com/kanboard/plugin-mailgun)
- [Postmark](https://github.com/kanboard/plugin-postmark)
- [Amazon S3](https://github.com/kanboard/plugin-s3)
- [Budget planning](https://github.com/kanboard/plugin-budget)
- [User timetables](https://github.com/kanboard/plugin-timetable)
- [Subtask Forecast](https://github.com/kanboard/plugin-subtask-forecast)
- [Automatic Action example](https://github.com/kanboard/plugin-example-automatic-action)
- [Theme plugin example](https://github.com/kanboard/plugin-example-theme)
- [CSS plugin example](https://github.com/kanboard/plugin-example-css)
