<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function() use($app) {

   $data =  file_get_contents('employees.json');
   $empleados = json_decode($data, true);

   $app->render('index.php', compact('empleados'));
});

$app->get('/:id', function($id) use($app) {

    $data =  file_get_contents('employees.json');
    $empleados = json_decode($data, true);

    $app->render('details.php', compact('id', 'empleados'));
});

$app->run();