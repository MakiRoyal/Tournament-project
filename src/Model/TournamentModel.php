<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class TournamentModel extends Model
{

    public function TournamentList() {

        $statement = $this->pdo->prepare('SELECT * FROM `tournament` ORDER BY id desc');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createTournament(string $name, string $players, string $description) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `tournament` (`name`, `players`, `description`) VALUES (:name, :players, :description)');

        $statement->execute([
            'name' => $name,
            'players' => $image,
            'description' => $description,
        ]);
    }




    public function deleteTournament($id) 
    {

        $statement = $this->pdo->prepare('DELETE FROM `tournament` WHERE `id` = :id');

        $statement->execute([
            'id' => $id,
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    

}