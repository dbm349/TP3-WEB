 <?php

    $router->get('', 'PagesController@home');
    $router->get('consigna', 'PagesController@about');
    $router->get('contact', 'PagesController@contact');


    $router->get('turnos', 'TurnoController@index');
    $router->get('turnos/create', 'TurnoController@create');
    $router->post('turnos/validate', 'TurnoController@validate');
    $router->get('turnos/completo', 'TurnoController@turnoCompleto');
    
    

    $router->get('not_found', 'ProjectController@notFound');
    $router->get('internal_error', 'ProjectController@internalError');
