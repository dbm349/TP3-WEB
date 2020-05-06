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
        $turnos = $this->model->get();
        return view('turnos', compact('turnos'));
    }

    

    public function create() {       

        return views('turnos.create');
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
            );

            $array_data[]=$dato;
            $datos_finales= json_encode($array_data);
                       
            $extensiones = array(0=>'image/jpeg',1=>'image/png');
     
            $chequeo = true;        
            if($chequeo == true) {
                if(empty($dato['nombre'])){
                    $chequeo = false; 
                } elseif (!preg_match('/^[a-zA-ZÀ-ž\s]+$/', $dato['nombre'])) {
                    $chequeo = false;
                }
                
                if(empty($dato['email'])){
                    $chequeo = false; 
                } elseif(!filter_var($dato['email'], FILTER_VALIDATE_EMAIL)) {
                    $chequeo = false; 
                }
                
                if(empty($dato['tel'])){
                    $chequeo = false;
                }elseif(!is_numeric($extra['tel'])){
                    $chequeo = false;
                }    

                if(empty($dato['nacimiento'])){
                    $chequeo = false;
                }
                
                if(empty($dato['fechaturno'])){
                    $chequeo = false;
                }

                if(empty($dato['talla'])) {
                } elseif (!is_numeric($extra['talla'])){
                    $chequeo = false;
                } elseif (($dato['talla']<20) || ($dato['talla']>45)){
                    $chequeo = false;
                }
                
            }
            
            $ruta_nueva = "";
            if ($chequeo == true) {
                if(in_array($_FILES['diagnostico']['type'],$extensiones)){
                   $indexphp = dirname(realpath(__FILE__), 2);
                   $ruta_origen = $_FILES['diagnostico']['tmp_name'];
                 
                   $extensionArchivo = substr($_FILES['diagnostico']['name'],strlen($_FILES['diagnostico']['name'])-4,strlen($_FILES['diagnostico']['name']));
                   $horaNueva = str_replace(':','-',$dato['horaturno']);
                   
                   
                   //uso el nombre del paciente, la fecha del turno y la hora para no reemplazar una foto con el mismo nombre
                   
                   //Reemplazar los espacios en el nombre por guiones
                   $nombreLimpio = preg_replace('/\s+/', '-', $dato['nombre']);
                   
                   $nombreArchivo = $nombreLimpio.'-'.$extra['fechaturno'].'-'.$horaNueva.$extensionArchivo;
                   $ruta_nueva = $indexphp . '\\Diagnosticos\\' . $nombreArchivo; 
                   if (move_uploaded_file($ruta_origen,$ruta_nueva)){ 
                           $dirImagen = './Diagnosticos/'.$nombreArchivo;
                   }
                }else{
                   $nombreArchivo = "";
                   $dirImagen = "";
                } 
            }
             else {
                echo 'Campos erroneos';
        
                $this->model->insert($dato);
                return redirect('turnos');    
            }           
   
        } 
           
    }












