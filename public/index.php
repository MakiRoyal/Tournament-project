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

$router->before('GET', '/event', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /login');
        exit();
    }
});

$router->before('GET', '/setting', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /login');
        exit();
    }
});


$router->before('GET', '/createEvent', function() {
    if ($_SESSION['user']['role'] != 'admin') {
        header('location: /login');
        exit();
    }
});

$router->before('GET', '/createArticle', function() {
    if ($_SESSION['user']['role'] != 'admin') {
        header('location: /login');
        exit();
    }
});

$router->before('GET', '/admin', function() {
    if ($_SESSION['user']['role'] != 'admin') {
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

$router->get('/', 'Mvc\Controller\UserController@ListUsers');

$router->get('/profil', 'Mvc\Controller\AccueilController@displayProfil');
$router->post('/profil', 'Mvc\Controller\UserController@updateProfil');

$router->get('/abonnement', 'Mvc\Controller\AccueilController@displaySub');
$router->post('/abonnement', 'Mvc\Controller\UserController@subscription');

$router->get('/event', 'Mvc\Controller\EventController@ListEvent');

$router->get('/article', 'Mvc\Controller\ArticleController@ArticleList');

$router->get('/setting', 'Mvc\Controller\AccueilController@displaySetting');

$router->get('/createEvent', 'Mvc\Controller\EventController@EventList');
$router->post('/admin/createEvent/deleteEvent', 'Mvc\Controller\EventController@deleteEvent');
$router->post('/createEvent', 'Mvc\Controller\EventController@createEvent');

$router->get('/createArticle', 'Mvc\Controller\ArticleController@listArticle');
$router->post('/admin/createArticle/deleteArticle', 'Mvc\Controller\ArticleController@deleteArticle');
$router->post('/createArticle', 'Mvc\Controller\ArticleController@createArticle');

$router->get('/admin', 'Mvc\Controller\AccueilController@displayAdmin');

$router->get('/header', 'Mvc\Controller\userController@usersList');

$router->get('(\d+)', 'Mvc\Controller\userController@findOneUser');


$router->run();

?>
