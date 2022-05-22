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

    public function displayEvent()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('event.html.twig');
    }

    public function displayArtcile()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('articles.html.twig');
    }

    public function displayAdmin()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('admin.html.twig');
    }

    
    public function displayCreateEvent()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('createEvent.html.twig');
    }


    public function displayCreateArticle()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('createArticle.html.twig');
    }

    public function displayReglage()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('reglage.html.twig');
    }
    
    public function displaySetting()
    {
        // var_dump($_SESSION);
        echo $this->twig->render('setting.html.twig');
    }
}

