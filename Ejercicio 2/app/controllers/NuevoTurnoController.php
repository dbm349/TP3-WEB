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
            $diagnosticoImg = base64_encode($result['diagnostico']);
            return view('turnoReservado', ['turnonuevo' => $result, 'diagnosticoImg'=>$diagnosticoImg]);
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
                                        'diagnostico' => $_FILES["diagnostico"]["tmp_name"]
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
                'diagnostico' => file_get_contents($_FILES["diagnostico"]["tmp_name"]),
                'extension' => pathinfo($_FILES["diagnostico"]["name"], PATHINFO_EXTENSION)
                ];
        $this->model->insert($turno);
        return $turno;
    }
}