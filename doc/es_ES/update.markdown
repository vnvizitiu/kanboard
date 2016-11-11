Actualizar Kanboard a una nueva versi�n
=======================================

La actualizaci�n de Kanboard a una nueva versi�n es perfecta.
El proceso se puede resumir simplemente copiar la carpeta de datos a la nueva carpeta Kanboard .
Kanboard ejecutar� migraciones de bases de datos de forma autom�tica.

Cosas importantes que hacer antes de actualizar
--------------------------------------

- **Siempre crear un backup de tus datos antes de actualizarlo**
- Verificar que tu backup es valido
- Siempre leer el [change log](https://github.com/kanboard/kanboard/blob/master/ChangeLog) para verificar si hay cambios destacados
- Siempre cerrar las sesiones de todos los usuarios (eliminar todas las sesiones en el servidor)

Desde el archivo (Versi�n estable )
---------------------------------

1. Descomprimir el nuevo archivo
2. Copiar el contenido de la carpeta de datos en el directorio reci�n descomprimido
3. Copiar tu `config.php` personalizado si tienes uno 
4. Copiar tus plugins sin son necesarios
5. Aseg�rese de que el directorio `data` es escribible por el usuario del servidor web
6. Testearlo
7. Eliminar tu viejo directorio del Kanboard

Desde el repositorio (development version)
-----------------------------------------

1. `git pull`
2. `composer install --no-dev`
3. Inicia la sesi�n y comprobar si todo est� bien

Nota: Este m�todo se instalar� la **versi�n de desarrollo actual**, utilice a su propio riesgo.
