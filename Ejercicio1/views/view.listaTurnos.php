<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos - Lista de Turnos</title>
</head>
<body>
    <header>
        <?php 
            include 'views/view.header.php'; 
        ?>
    </header>
    <table>
        <thead>
            <tr>
                <th scope="col">Fecha del turno</th>
                <th scope="col">Hora del turno</th>
                <th scope="col">Nombre del paciente</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Link a la ficha del turno</th>
            </tr> 
        </thead>

        <tbody>
            <?php
                if(file_exists('data/data.json')){
                    if (filesize('data/data.json') == 0){
                        echo 'No hay turnos pendientes!';
                    } else {
                        $datos_turno=file_get_contents('data/data.json');
                        $array_data= json_decode($datos_turno,true);
                        $cantidad_turnos=sizeof($array_data);

                        foreach($array_data as $datos){
            ?>
                        <tr>
                            <td><?=$datos['fechaturno']?></td>     
                            <td><?=$datos['horaturno']?></td>
                            <td><?=$datos['nombre']?></td>
                            <td><?=$datos['tel']?></td>
                            <td><?=$datos['email']?></td>
                            <td><a href=<?= "/turno?id=" . $datos['numeroTurno'] ?>>Link del turno</td> 
                        </tr>
            <?php
                        }
                    }
                } else {
                    echo 'El archivo JSON no existe';
                }
            ?>
        </tbody>
    </table>
</body>
</html>