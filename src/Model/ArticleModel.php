<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class ArticleModel extends Model
{

    public function ArticleList() {

        $statement = $this->pdo->prepare('SELECT * FROM `article`');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}