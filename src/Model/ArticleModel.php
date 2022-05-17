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



    public function createArticle(string $title, string $image, string $place, string $date, string $bio) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `article` (`title`, `image`, `place`, `date`, `bio`) VALUES (:title, :image, :place, :date, :bio)');

        $statement->execute([
            'title' => $title,
            'image' => $image,
            'place' => $place,
            'date' => $date,
            'bio' => $bio,
        ]);
    }

}