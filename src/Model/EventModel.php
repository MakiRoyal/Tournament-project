<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class EventModel extends Model
{

    public function EventList() {

        $statement = $this->pdo->prepare('SELECT * FROM `events`');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}