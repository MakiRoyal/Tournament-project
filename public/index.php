<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();

$router->before('GET', '/login', function() {
    if (isset($_SESSION['user'])) {
        header('location: /');
        exit();
    }
});

$router->before('GET', '/inscription', function() {
    if (isset($_SESSION['user'])) {
        header('location: /');
        exit();
    }
});

$router->before('GET', '/', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /login');
        exit();
    }
});

$router->before('GET', '/abonnement', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /login');
        exit();
    }
});

$router->get('/deconnection', function() {
    session_destroy();
    header('location: /login');
});





$router->get('/login', 'Mvc\Controller\UserController@login');
$router->post('/login', 'Mvc\Controller\UserController@login');

$router->get('/inscription', 'Mvc\Controller\UserController@createUser');
$router->post('/inscription', 'Mvc\Controller\UserController@createUser');

$router->get('/', 'Mvc\Controller\AccueilController@displayAccueil');


$router->get('/profil', 'Mvc\Controller\AccueilController@displayProfil');
$router->post('/profil', 'Mvc\Controller\UserController@updateProfil');

$router->get('/abonnement', 'Mvc\Controller\AccueilController@displaySub');
$router->post('/abonnement', 'Mvc\Controller\UserController@subscription');

$router->get('/event', 'Mvc\Controller\EventController@ListEvent');

$router->run();

?>