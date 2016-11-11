Plugin de configuraci�n del directorio
======================================

Para instalar, actualizar y eliminar plugins dede la interface de usuario, debes tener estos requerimientos:

- El directorio del plugin debe ser de escritura por el usuario del servidor web
- La extensi�n Zip debe estar disponible en tu server.
- Los parametros de configuraci�n `PLUGIN_INSTALLER` deben estar en `true`

Para desactivar esta funci�n , cambie el valor de `PLUGIN_INSTALLER` a `false` en tu archivo de configuraci�n.
Tambi�n puede cambiar los permisos de la carpeta Plugin en el filesystem.

S�lo los administradores pueden instalar plugins desde la interfaz de usuario.

Por defecto, s�lo plug-in que aparece en la p�gina web de Kanboard est�n disponibles .
