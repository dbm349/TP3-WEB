<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Turnos;

class NuevoTurnoController extends Controller
{
    public function __construct()
    {
        $this->model = new Turnos();
    }

    /**
     * Show all task
     */
    public function index()
    {
        $tasks = $this->model->get();
        return view('turnos', compact('turnos'));
    }

    public function create()
    {
       
                    if(empty($nombre)){
                        echo "<p class='error'> * Campo nombre incompleto </p>";
                    }else{
                        if(!preg_match("/^[A-Za-zÀ-ž\s]*$/",$nombre)){
                            echo "<p class='error'> * El nombre solo debe contener letras</p>";
                        }
                    }
                
                    if(empty($email)){
                        echo "<p class='error'> * Campo email incompleto </p>";
                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                        echo "<p class='error'> * Email incorrecto </p>";
                    }
                
        
                    if(empty($tel)){
                        echo "<p class='error'> * Campo teléfono incompleto </p>";
                    }else{
                        if(!is_numeric($tel)){
                            echo "<p class='error'> * Solo se permiten números </p>";
                        }
                    }
                
                    if((!is_numeric($edad))){
                        echo "<p  class='error'> *La edad debe ser numérica </p>";
                    }else{
                        if(($edad<1) || ($edad>105)){
                            echo "<p class='error'> * La edad debe ser mayor a 1 y menor a 105 </p>";
                        }
                    }
        
        
                    if((!preg_match("/^(0[8-9]|1[0-6]):(00|15|30|45)$/",$horaturno)) &&
                             (!preg_match("/^(17):(00)$/",$horaturno))){
                        echo "<p class='error'> * Turno no válido </p>";
                    }
                    
                    
                    if(empty($nacimiento)){
                        echo "<p class='error'> * Campo fecha de nacimiento incompleto </p>";
                    }elseif(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$nacimiento)){
                            echo "<p class='error'> * Formato de fecha inválida </p>";
                    
                    }elseif($fnacimiento>$fechaactual){
                            echo "<p class='error'> * ERROR! Fecha de nacimiento incorrecta</p>";
                    }
                    
                
        
        
        
                    if(empty($fechaturno)){
                        echo "<p class='error'> * Campo fecha de turno incompleto </p>";
                    }elseif(!preg_match("/^([0-9][0-9][0-9][0-9])-(0[0-9]|1[0-2])-([0-2][0-9]|3[0-1])$/",$nacimiento)){
                            echo "<p class='error'> * Formato de fecha inválida </p>";
                        
                    }elseif($fturno<$fechaactual){
                            echo "<p class='error'> * La fecha del turno debe ser mayor o igual a la actual</p>";
                    }
                    
                
        
                    if((!is_numeric($altura))){
                        echo "<p> *La altura debe ser numérica </p>";
                    }elseif(($altura<0.5) || ($altura>2)){
                            echo "<p class='error'> * La altura debe ser mayor a 0.5 y menor a 2 </p>";
                        }
                        
                        
                    
                    if((!is_numeric($talla))){
                        echo "<p> *La altura debe ser numérica </p>";
                    }else{
        
                        if(($talla<20) || ($talla>45)){
                            echo "<p class='error'> * La talla debe ser mayor a 20 y menor a 45 </p>";
                        }
                    } 
        
        
                    if(($cpelo !="Castaño") &&
                    ($cpelo !="Rubio") &&
                    ($cpelo !="Pelirrojo") &&
                    ($cpelo !="Negro")){
        
                        echo "<p class='error'> * Color de pelo incorrecto </p>";
                    }
                   
        $dato= array(
            'numeroTurno'=> $numeroTurno,
            'nombre'=> $_POST['nombre'],
            'email'=> $_POST['email'],
            'tel'=> $_POST['tel'],
            'edad'=> $_POST['edad'],
            'talla'=> $_POST['talla'],
            'altura'=> $_POST['altura'],
            'nacimiento'=> $_POST['nacimiento'],
            'cpelo'=> $_POST['cpelo'],
            'fechaturno'=> $_POST['fechaturno'],
            'horaturno'=> $_POST['horaturno'],
            'diagnostico' => $Nom_imagen,
        );
        $this->model->insert($dato);
        return redirect('turnos');
    }
}
