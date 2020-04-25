<!DOCTYPE html>
<html> 
    <head>
        <title>Sistema de Turnos - Ficha de Turno</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <?php 
                include 'views/view.header.php'; 
            ?>
        </header>        

        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "El turno para el día {$_POST['fechaturno']} a las {$_POST['horaturno']} se reservó con exito";
            }
        ?>

        <br>
        <h1>Datos Personales</h1>
        <br>

        <h2>Nombre: </h2>
        <?= $extra['nombre'];?>
        
        <h2>Email: </h2>
        <?= $extra['email'];?>

        <h2>Teléfono: </h2> 
        <?= $extra['tel'];?>

        <h2>Edad: </h2>
        <?= $extra['edad'];?>

        <h2>Talla de Calzado: </h2>
        <?= $extra['talla'];?>

        <h2>Altura: </h2>
        <?= $extra['altura'];?>

        <h2>Fecha de Nacimiento: </h2>
        <?= $extra['nacimiento'];?>

        <h2>Color de Pelo: </h2>
        <?= $extra['cpelo'];?>

        <br>
        <h2>Fecha de Turno: </h2>
        <?= $extra['fechaturno'];?>

        <h2>Horario del Turno: </h2>
        <?= $extra['horaturno'];?>


        <?php
            if(file_exists($dirImagen)) {
                echo "<br><br>";
                echo "<h2>Diagnostico</h2>";
                echo "<img src=$dirImagen>";
                echo "<br><br>";
            }            
        ?>     
        
    </body>
</html>