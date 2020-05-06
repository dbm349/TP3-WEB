 <?php

    $router->get('', 'PagesController@home');
    $router->get('consigna', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');


    $router->get('turnos', 'NuevoTurnoController@index');
    $router->get('turnos/create', 'NuevoTurnoController@create');
    

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');
