<!DOCTYPE html>
<html> 
    <head>
        <title>Sistema de Turnos - Nuevo Turno</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <?php 
                include 'views/view.header.php'; 
            ?>
        </header>

        <h1>TURNOS CONSULTORIO MÉDICO</h1>
        <form action="/turno_reservado" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Datos Personales</legend>
                <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" maxlength="50" pattern=[a-zA-ZÀ-ž\s]]{1,50} placeholder="Ingrese su nombre"  required>
                * 
                <br><br>

                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="Ingrese su email" required>
                *
                <br><br>    

                <label for="tel">Teléfono: </label> 
                <input type="number" id="tel" name="tel" pattern=[0-9\+][0-9]{13} placeholder="Ingrese su teléfono" required>
                *
                <br><br>

                <label for="edad">Edad: </label>
                <input type="number" id="edad" name="edad"  min="1" max="105" placeholder="Rango válido [1-105]">
                <br><br>

                <label for="talla">Talla de Calzado: </label>
                <input type="number" id="talla" name="talla" min="20" max="45" placeholder="Rango válido [20-45]">
                <br><br>

                <label for="altura">Altura: </label>
                0.5
                <input type="range" id="altura" name="altura" min="0.5" max="2" step="0.1">
                2
                <br><br>

                <label for="nacimiento">Fecha de Nacimiento: </label>
                <input type="date" id="nacimiento" name="nacimiento" required>
                *
                <br><br>

                <label for="cpelo">Color de Pelo: </label>
                    <select id="cpelo" name="cpelo">
                        <option value="Castaño">Castaño</option>
                        <option value="Rubio">Rubio</option>
                        <option value="Pelirrojo">Pelirrojo</option>
                        <option value="Negro">Negro</option>
                    </select>
                <br><br>

                <label for="fechaturno">Fecha de Turno: </label>
                <input type="date" id="fechaturno" name="fechaturno" min="2020-01-01" required>
                *
                <br><br>
                
                <label>Horario del Turno: </label>
                <input type="time" id="horaturno" name="horaturno" min="08:00:00" max="17:00:00" value="08:00:00" step="900" required>
                *
                <br><br><br>
                * <small>Este dato es requerido</small>
                <br><br>

                <label>Diagnostico</label>
                <input type="file" name="diagnostico" accept=".jpg,.png">
                <br><br><br><br>

                <input type="reset" name="limpiar" value="limpiar">
                <input type="submit" name="submit" value="Enviar">

            </fieldset>
        </form>
        
        
    </body>
</html>