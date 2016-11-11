Agregar notificaciones con los tipos de plugin
==============================================

Puede enviar notificaciones a casi cualquier sistema mediante la adici�n de un nuevo tipo .
There are two kinds of notifications: project and user.

- Project: Notificaciones configuradas a nivel de proyecto
- Usuario: Notificaciones enviadas individualmente y configurada a cada perfil de usuario.

Registra un nuevo tipo de notificaci�n
--------------------------------------

En tu archivo de registro del plugin llama el metodo `setType()`:

```php
$this->userNotificationTypeModel->setType('irc', t('IRC'), '\Kanboard\Plugin\IRC\Notification\IrcHandler');
$this->projectNotificationTypeModel->setType('irc', t('IRC'), '\Kanboard\Plugin\IRC\Notification\IrcHandler');
```

Su controlador puede ser registrado por el usuario o la notificaci�n del proyecto. No necesariamente tienen que soportarlo .
Cuando tu handler es registrdo, el usuario final **end-user** puede elegir recibir el nuevo tipo de notificaci�n o no 

Notificaci�n de Handler
-----------------------

Su controlador de notificaci�n debe implementar la interfaz `Kanboard\Core\Notification\NotificationInterface`:

```php
interface NotificationInterface
{
    /**
     * Envia notificaci�n a un usuario
     *
     * @access public
     * @param  array     $user
     * @param  string    $event_name
     * @param  array     $event_data
     */
    public function notifyUser(array $user, $event_name, array $event_data);

    /**
     * Envia notificacion a un projecto
     *
     * @access public
     * @param  array     $project
     * @param  string    $event_name
     * @param  array     $event_data
     */
    public function notifyProject(array $project, $event_name, array $event_data);
}
```

Ejemplo de notificacion de plugins
---------------------------------

- [Slack](https://github.com/kanboard/plugin-slack)
- [Hipchat](https://github.com/kanboard/plugin-hipchat)
- [Jabber](https://github.com/kanboard/plugin-jabber)

