# Ejercicio 1

## Instalación
- Clonar el repositorio.
- Crear un schema de base de datos con algun cliente MySQL.
- Ejecutar los scripts de la carpeta 'sql' en orden para crear la base de datos y sus tablas.
- Crear el archivo 'config.php' con la configuracion apropiada de su conexion con la base de datos.
  Utilice el archivo existente 'config.php.example' como base para la cracion del mismo.
- Abrir una terminal y ubicado en el directorio del ejercicio ejecutar 'composer install'.

## Ejecucion
Una vez realizada la instalación realizar los siguientes pasos:

- Abrir una terminal.
- Ubicarse en el directorio del ejercicio clonado.
- Ejecutar 'php -S localhost:9000' (Puede elegir otro numero de puerto).
- Luego ingresar a http://localhost:9000 .

## Teoria
### 1 La generación del número de turno debe hacerse vía motor de base de datos. ¿Qué cambios hubo que realizar para la generación del id?

La generación del ID ahora se realiza de manera automática cuando se ingresa un nuevo turno en la base de datos, colocando la palabra clave AUTO_INCREMENT en el id del turno.

