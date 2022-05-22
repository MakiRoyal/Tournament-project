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
            move_uploaded_file($from, $to);

            $from = $_FILES['image2']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image2']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image3']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image3']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image4']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image4']['name'];
            move_uploaded_file($from, $to);
            
            $from = $_FILES['image5']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image5']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image6']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image6']['name'];
            move_uploaded_file($from, $to);
            


                $this->userModel->createUser($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['city'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['gender'], $_POST["causes"], $_FILES['image']['name'], $_FILES['image2']['name'], $_FILES['image3']['name'], $_FILES['image4']['name'], $_FILES['image5']['name'], $_FILES['image6']['name']);
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
                    'role' => $account['role']
                ];
                header('Location: /');
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
        $account = $this->userModel->loginIn($_SESSION['user']['mail']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $from = $_FILES['image']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image2']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image2']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image3']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image3']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image4']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image4']['name'];
            move_uploaded_file($from, $to);
            
            $from = $_FILES['image5']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image5']['name'];
            move_uploaded_file($from, $to);

            $from = $_FILES['image6']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image6']['name'];
            move_uploaded_file($from, $to);




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
                'role' => $_SESSION['user']['role'],
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