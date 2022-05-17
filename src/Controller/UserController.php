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
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $from = $_FILES['image']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image']['name'];
            if (move_uploaded_file($from, $to))
            {
                $this->userModel->createUser($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['city'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['gender'], $_POST["causes"], $_FILES['image']['name'], $_FILES['image2']['name'], $_FILES['image3']['name'], $_FILES['image4']['name'], $_FILES['image5']['name'], $_FILES['image6']['name']);
            }

            header('location: /');
            exit();
        }
        echo $this->twig->render('inscription.html.twig');
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mail']) && isset($_POST['password'])) {
            $account = $this->userModel->loginIn($_POST['mail']);
            if (isset($_POST['password']) && isset($account['password']) && password_verify($_POST['password'], $account['password'])) {

                $_SESSION['user'] = [
                    'id' => $account['id'],
                    'lastname' => $account['lastname'],
                    'firstname' => $account['firstname'],
                    'mail' => $account['mail'],
                    'password' => $_POST['password'],
                    'age' => $account['age'],
                    'city' => $account['city'],
                    'gender' => $account['gender'],
                    'militantCause' => $account['militantCause'],
                    'image1' => $account['image1'],
                    'image2' => $account['image2'],
                    'image3' => $account['image3'],
                    'image4' => $account['image4'],
                    'image5' => $account['image5'],
                    'image6' => $account['image6'],
                    'subscription' => $account['subscription'],
                    'work' => $account['work'],
                    'bio' => $account['bio'],
                ];
                header('Location: /');
                exit();
            }
        }

        echo $this->twig->render('base.html.twig');
    }

    public function subscription()
    {
        var_dump($_POST);
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
        var_dump($_SESSION);
        $account = $this->userModel->loginIn($_SESSION['user']['mail']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $from = $_FILES['image']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image']['name'];

            if(strlen($_FILES['image']['name']) === 0){
                $_Files['image']['name'] = $_SESSION['user']['image1'];
            }



            $this->userModel->updateProfil($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['city'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['gender'], $_POST["causes"], $_FILES['image']['name'], $_FILES['image2']['name'], $_FILES['image3']['name'], $_FILES['image4']['name'], $_FILES['image5']['name'], $_FILES['image6']['name'], $_POST['work'], $_POST['bio'], $_SESSION['user']['mail']);
            
            $_SESSION['user'] = [
                'lastname' => $_POST['lastname'],
                'firstname' => $_POST['firstname'],
                'mail' => $_POST['mail'],
                'password' => $_POST['password'],
                'age' => $_POST['age'],
                'city' => $_POST['city'],
                'gender' => $_POST['gender'],
                'militantCause' => $_POST['causes'],
                'image1' => $_FILES['image']['name'],
                'image2' => $_FILES['image2']['name'],
                'image3' => $_FILES['image3']['name'],
                'image4' => $_FILES['image4']['name'],
                'image5' => $_FILES['image5']['name'],
                'image6' => $_FILES['image6']['name'],
                'subscription' => $_SESSION['user']['subscription'],
                'work' => $_POST['work'],
                'bio' => $_POST['bio'],
            ];
            
            header('location: /');
            exit();
        }
        echo $this->twig->render('profil.html.twig');
    }




    public function ListUsers() {
        $users = $this->userModel->findAll();
        echo $this->twig->render('accueil.html.twig', ['users' => $users]);
    }


}