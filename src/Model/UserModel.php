<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class UserModel extends Model
{

    public function createUser(string $firstname, string $lastname, string $age, string $city, string $mail, string $password, string $gender, string $militantCause, string $image1, string $image2, string $image3, string $image4, string $image5, string $image6) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `user` (`firstname`, `lastname`, `age`, `city`, `mail`, `password` , `gender` , `militantCause`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES (:firstname, :lastname, :age, :city, :mail, :password, :gender, :militantCause, :image1, :image2, :image3, :image4, :image5, :image6)');

        $statement->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'age' => $age,
            'city' => $city,
            'mail' => $mail,
            'password' => $password,
            'gender' => $gender,
            'militantCause' => $militantCause,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5,
            'image6' => $image6,
        ]);
    }

    public function loginIn(string $mail) {

        $statement = $this->pdo->prepare('SELECT * FROM `user` WHERE `mail` = :mail');

        $statement->execute([
            'mail' => $mail,
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    



    public function Subscription(string $subscritpion) 
    {

        $statement = $this->pdo->prepare('UPDATE `user` SET `subscription` = :subscritpion');

        $statement->execute([
            'subscritpion' => $subscritpion,

        ]);
    }


    

    public function updateProfil(string $firstname, string $lastname, string $age, string $city, string $mail, string $password, string $gender, string $militantCause, string $image1, string $image2, string $image3, string $image4, string $image5, string $image6,  string $work, string $bio, string $mailUpdate) 
    {
        $statement = $this->pdo->prepare('UPDATE `user` SET `firstname` = :firstname,  `lastname` = :lastname, `age` = :age, `city` = :city, `mail` = :mail, `password` = :password, `gender` = :gender, `militantCause` = :militantCause, `image1` = :image1, `image2` = :image2, `image3` = :image3, `image4` = :image4, `image5` = :image5, `image6` = :image6, `work` = :work, `bio` = :bio  where mail = :mailUpdate');

        $statement->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'age' => $age,
            'city' => $city,
            'mail' => $mail,
            'password' => $password,
            'gender' => $gender,
            'militantCause' => $militantCause,
            'image1' => $image1,
            'image2' => $image2,
            'image3'=> $image3,
            'image4' => $image4,
            'image5'=> $image5,
            'image6'=> $image6,
            'work'=> $work,
            'bio' => $bio,
            'mailUpdate' => $_SESSION['user']['mail']
        ]);
    }






    public function findAll() {

        $statement = $this->pdo->prepare('SELECT * FROM `user`');

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



    public function findOneUser(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM user WHERE id = :id ');
        $statement->execute([
            'id' => $id,
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($user))
        {
            return $user;
        }

        return null;
    }
}