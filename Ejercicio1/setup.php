<?php

include 'core/Router.php';
include 'core/Request.php';
include 'models/Turno.php';
include 'controllers/TurnosController.php';
include 'controllers/NuevoTurnoController.php';
include 'controllers/ListaTurnosController.php';


use App\core\Router;
use App\core\Request;

$router = new Router;
$router->define([
    'GET /' => 'TurnosController@index',
    'GET /nuevo_turno' => 'NuevoTurnoController@new',
    'GET /lista_de_turnos' => 'ListaTurnosController@new',
    'POST /turno_reservado' => 'NuevoTurnoController@save',
    'GET /turno' => 'ListaTurnosController@view'
]);

$request = new Request;