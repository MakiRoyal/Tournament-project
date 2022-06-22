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
                $this->userModel->createUser($_POST['firstname'], $_POST['lastname'], $_POST['email'],password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['age']);
            header('location: /');
            exit();
        
        echo $this->twig->render('inscription.html.twig');
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
            $account = $this->userModel->loginIn($_POST['email']);
            if (isset($_POST['password']) && isset($account['password']) && password_verify($_POST['password'], $account['password'])) {

                $_SESSION['user'] = [
                    'lastname' => $account['lastname'],
                    'firstname' => $account['firstname'],
                    'email' => $account['email'],
                    'password' => $_POST['password'],
                    'age' => $account['age'],
                ];
                header('Location: /tournament');
                exit();
            }
        }

        echo $this->twig->render('base.html.twig');
    }

    public function subscription()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->userModel->Subscription($_POST['sub']);
            $_SESSION['user']['subscription'] = $_POST['sub'];
            header('location: /');
            exit();
        }
        echo $this->twig->render('abonnement.html.twig');
    }



    public function updateProfil()
    {
        $account = $this->userModel->loginIn($_SESSION['user']['email']);
            $this->userModel->updateProfil($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['city'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT),$_SESSION['user']['email']);
            
            $_SESSION['user'] = [
                'lastname' => $_POST['lastname'],
                'firstname' => $_POST['firstname'],
                'mail' => $_POST['email'],
                'password' => $_POST['password'],
                'age' => $_POST['age'],
                'role' => $_SESSION['user']['role'],
            ];
            
            header('location: /');
            exit();
        echo $this->twig->render('profil.html.twig');
    }




    public function ListUsers() {
        $users = $this->userModel->findAll();
        echo $this->twig->render('accueil.html.twig', ['users' => $users]);
    }
    
    public function usersList() {
        $users = $this->userModel->findAll();
        echo $this->twig->render('header.html.twig', ['user' => $users]);
    }


    public function findOneUser(int $id) {
        $user = $this->userModel->findOneUser($id);
        if (empty($user))
        {
            header('Location: /');
            exit();
        }
        echo $this->twig->render('user.html.twig', [
            'user' => $user
        ]);
    }


}