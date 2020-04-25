<?php

namespace App\controllers;

class ListaTurnosController
{
    public function new()
    {
        include "views/view.listaTurnos.php";
    }

    public function view()
    {
        $numeroTurno = (int) htmlspecialchars($_GET["id"]);

        if(file_exists('data/data.json')){
            if (filesize('data/data.json') == 0){
                echo 'No hay turnos pendientes!';
            } else {
                $datos_turno=file_get_contents('data/data.json');
                $array_data= json_decode($datos_turno,true);

                $encontrado = false;
                foreach($array_data as $datos){
                    if($datos['numeroTurno'] == $numeroTurno) {
                        $extra= array(
                            'numeroTurno'=> $numeroTurno,
                            'nombre'=> $datos['nombre'],
                            'email'=> $datos['email'],
                            'tel'=> $datos['tel'],
                            'edad'=> $datos['edad'],
                            'talla'=> $datos['talla'],
                            'altura'=> $datos['altura'],
                            'nacimiento'=> $datos['nacimiento'],
                            'cpelo'=> $datos['cpelo'],
                            'fechaturno'=> $datos['fechaturno'],
                            'horaturno'=> $datos['horaturno'],
                        );

                        $horaNueva = str_replace(':','-',$extra['horaturno']);
                        
                        //Reemplazar los espacios en el nombre por guiones
                        $nombreLimpio = preg_replace('/\s+/', '-', $extra['nombre']);

                        $dirImagenParcial = "./Diagnosticos/".$nombreLimpio.'-'.$extra['fechaturno'].'-'.$horaNueva.".*";
                        
                        //Al no saber la extensión del archivo, busco la primer imagen que coincida con el nombre
                        //Glob hace la busqueda, Reset devuelve el primer resultado del arreglo
                        $dirImagen = reset(glob($dirImagenParcial));

                        $encontrado = true;
                    }
                }
                include "views/view.fichaTurno.php";
            }
        }
    }
}
