<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();
// $router->get('/', function(){
//     echo('ergehehte');
// });
$router->get('/', 'Mvc\Controller\AccueilController@displayAccueil');

$router->run();

?>