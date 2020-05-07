<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Turnos;

class NuevoTurnoController extends Controller{

    public function __construct(){
        $this->model = new Turnos();
    }

    /**
     * Show all task
     */
    public function index(){
        $turnos = $this->model->get();
        return view('turnos', compact('turnos'));
    }

    public function create(){
        return view('turnos.create');
    }

    public function validate(){
        $Error =  array();
        require 'app/controllers/ValidateController.php'; 

        if (empty($Error)){
            $result = $this->save();
            return view('turnoReservado', ['turnonuevo' => $result]);
        }else{
            return view('turnos.create', [
                                        'errores'=> $Error,
                                        'nombre' => $_POST['nombre'],
                                        'email' => $_POST['email'],
                                        'tel' => $_POST['tel'],
                                        'edad' => $_POST['edad'],
                                        'talla' => $_POST['talla'],
                                        'altura' => $_POST['altura'],
                                        'nacimiento' => $_POST['nacimiento'],
                                        'cpelo' => $_POST['cpelo'],
                                        'fechaturno' => $_POST['fechaturno'],
                                        'horaturno' => $_POST['horaturno'],
                                        'diagnostico' => $contenido
            ]);
        }   
    }

    public function save(){
        $turno = [
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'tel' => $_POST['tel'],
                'edad' => $_POST['edad'],
                'talla' => $_POST['talla'],
                'altura' => $_POST['altura'],
                'nacimiento' => $_POST['nacimiento'],
                'cpelo' => $_POST['cpelo'],
                'fechaturno' => $_POST['fechaturno'],
                'horaturno' => $_POST['horaturno'],
                ];
        $this->model->insert($turno);
        return $turno;
    }
}
