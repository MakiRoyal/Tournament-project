<?php

namespace Mvc\Controller;

use Config\Controller;
use Twig\Environment;

class AccueilController extends Controller
{
    public function displayAccueil()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('accueil.html.twig');
    }

    public function displayProfil()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('profil.html.twig');
    }

    public function displaySub()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('abonnement.html.twig');
    }
}

