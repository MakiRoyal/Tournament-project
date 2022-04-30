<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class UserModel extends Model
{

    public function createUser(string $firstname, string $lastname, string $age, string $city, string $mail, string $password, string $gender, string $militantCause) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `users` (`firstname`, `lastname`, `age`, `city`, `mail`, `password` , `gender` , `militantCause`) VALUES (:firstname, :lastname, :age, :city, :mail, :password, :gender, :militantCause)');

        $statement->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'age' => $age,
            'city' => $city,
            'mail' => $mail,
            'password' => $password,
            'gender' => $gender,
            'militantCause' => $militantCause
        ]);
    }

    public function loginIn(string $mail) {

        $statement = $this->pdo->prepare('SELECT * FROM `users` WHERE `mail` = :mail');

        $statement->execute([
            'mail' => $mail,
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}