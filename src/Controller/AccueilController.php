<?php

namespace Mvc\Controller;

use Config\Controller;
use Twig\Environment;

class AccueilController extends Controller
{
    public function displayAccueil() {
        var_dump("gzrgzrg");
        echo $this->twig->render('acceuil.html.twig');
    }
}