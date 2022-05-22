<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class ArticleModel extends Model
{

    public function ArticleList() {

        $statement = $this->pdo->prepare('SELECT * FROM `article` ORDER BY id desc');

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


    public function deleteArticle($id) 
    {

        $statement = $this->pdo->prepare('DELETE FROM `article` WHERE `id` = :id');

        $statement->execute([
            'id' => $id,
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}