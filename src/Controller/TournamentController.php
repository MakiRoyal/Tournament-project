<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\TournamentModel;
use Twig\Environment;

class TournamentController extends Controller
{
    private TournamentModel $tournamentModel;

    public function __construct() {
        parent::__construct();
        $this->tournamentModel = new TournamentModel();
    }

    public function ListTournament() {
        $tournaments = $this->tournamentModel->TournamentList();
        echo $this->twig->render('tournament.html.twig', ['tournaments' => $tournaments]);
    }

    public function createTournament()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $from = $_FILES['image']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image']['name'];
            if (move_uploaded_file($from, $to))
            {
                $this->tournamentModel->createTournament($_POST['name'], $_POST['description'], $_POST['players']);
            }
            var_dump($_POST);
            header('');
            exit();
        }
        echo $this->twig->render('tournament.html.twig');
    }


}