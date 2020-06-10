# Ejercicio 4

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
### 4 Cada acción del ABM debe ser registrada usando el Logger del framework. Cada log debe ser de tipo INFO y almacenar fecha y hora, operación (ABM), y turno afectado (id). En los casos de modificación y baja, almacene el registro completo. ¿Considera esto util? ¿En que casos puede llegar a utilizarse?

La utilizacion del log es útil para registrar las operaciones (ABM) que realiza el usuario, esto nos permite llevar un control de los valores en nuestra base de datos y las operaciones realizadas, pudiendo asi restaurar los valores previos, por ejemplo, en caso de requerirlo por alguna equivocacion del usuario para volver al estado anterior.