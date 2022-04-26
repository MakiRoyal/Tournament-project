<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();

$router->get('/', 'Mvc\Controller\AccueilController@displayAccueil');
$router->get('/inscription', 'Mvc\Controller\UserController@createUser');

$router->run();

?>