<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\UserModel;
use Twig\Environment;

class UserController extends Controller
{
    private UserModel $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    public function createUser()
    {
        var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
           
            $this->userModel->createUser($_POST['firstname'], $_POST['lastname'], $_POST['city'], $_POST['age'], $_POST['gender'], $_POST['causes'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT));

            header('location: /');
            exit();
        }
        echo $this->twig->render('inscription.html.twig');
    }
}