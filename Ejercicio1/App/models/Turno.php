<?php

namespace App\models;

class Turno
{
    public function __construct($extra, $extensiones, $nombreArchivo)
    {
        $this->$numeroTurno = $extra['numeroTurno'];
        $this->$nombre = $extra['nombre'];
        $this->$email = $extra['email'];
        $this->$tel = $extra['tel'];
        $this->$edad = $extra['edad'];
        $this->$talla = $extra['talla'];
        $this->$altura = $extra['altura'];
        $this->$nacimiento = $extra['nacimiento'];
        $this->$cpelo = $extra['cpelo'];
        $this->$fechaTurno = $extra['fechaturno'];
        $this->$horaTurno = $extra['horaturno'];
        
        $this->$extensiones = $extensiones;
        $this->$nombreImagen = $nombreArchivo;
    }
}