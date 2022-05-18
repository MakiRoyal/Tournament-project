<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class EventModel extends Model
{

    public function EventList() {

        $statement = $this->pdo->prepare('SELECT * FROM `events` ORDER BY id desc');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createEvent(string $nom, string $image, string $description, string $date, string $place) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `events` (`nom`, `image`, `description`, `date`, `place`) VALUES (:nom, :image, :description, :date, :place)');

        $statement->execute([
            'nom' => $nom,
            'image' => $image,
            'description' => $description,
            'date' => $date,
            'place'=> $place,
        ]);
    }




    public function deleteEvent($id) 
    {

        $statement = $this->pdo->prepare('DELETE FROM `events` WHERE `id` = :id');

        $statement->execute([
            'id' => $id,
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    

}