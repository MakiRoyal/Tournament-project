<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();


$router->get('/', 'Mvc\Controller\UserController@login');
$router->post('/', 'Mvc\Controller\UserController@login');

$router->get('/inscription', 'Mvc\Controller\UserController@createUser');
$router->post('/inscription', 'Mvc\Controller\UserController@createUser');

$router->get('/accueil', 'Mvc\Controller\AccueilController@displayAccueil');

$router->run();

?>