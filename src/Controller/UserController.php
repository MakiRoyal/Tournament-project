<?php

namespace Mvc\Controller;

use Config\Controller;
use Twig\Environment;

class UserController extends Controller
{
    public function createUser()
    {
        echo $this->twig->render('inscription.html.twig');
    }
}