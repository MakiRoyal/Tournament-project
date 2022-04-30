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
                $this->userModel->createUser($_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['city'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['gender'], $_POST["causes"], $_FILES['image']['name']);
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
                    'age' => $account['age'],
                    'city' => $account['city'],
                    'gender' => $account['gender'],
                    'militantCause' => $account['militantCause'],
                    'image1' => $account['image1'],
                ];
                header('Location: /accueil');
                exit();
            }
        }

        echo $this->twig->render('base.html.twig');
    }


}