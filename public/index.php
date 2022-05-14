<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$router = new \Bramus\Router\Router();

$router->before('GET', '/', function() {
    if (isset($_SESSION['user'])) {
        header('location: /accueil');
        exit();
    }
});
$router->before('GET', '/inscription', function() {
    if (isset($_SESSION['user'])) {
        header('location: /accueil');
        exit();
    }
});
$router->before('GET', '/accueil', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /');
        exit();
    }
});
$router->before('GET', '/abonnement', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /');
        exit();
    }
});













$router->get('/', 'Mvc\Controller\UserController@login');
$router->post('/', 'Mvc\Controller\UserController@login');

$router->get('/inscription', 'Mvc\Controller\UserController@createUser');
$router->post('/inscription', 'Mvc\Controller\UserController@createUser');

$router->get('/accueil', 'Mvc\Controller\AccueilController@displayAccueil');


$router->get('/profil', 'Mvc\Controller\AccueilController@displayProfil');


$router->get('/abonnement', 'Mvc\Controller\AccueilController@displaySub');
$router->post('/abonnement', 'Mvc\Controller\UserController@subscription');






$router->get('/deconnection', function() {
    session_destroy();
    header('location: /');
});

$router->run();

?>