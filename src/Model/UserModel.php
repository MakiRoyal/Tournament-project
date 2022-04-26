<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class UserModel extends Model
{

    public function createUser(string $age, string $lastname, string $firstname, string $mail, string $password, string $city, string $gender, string $militantCause) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `users` (`firstname`, `lastname`, `age`, `city`, `mail`, `password` , `gender` , `militantCause`) VALUES (:firstname, :lastname, :age, :city, :password, :mail, :gender, :militantCause)');

        $statement->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'age' => $age,
            'city' => $city,
            'password' => $password,
            'mail' => $mail,
            'gender' => $gender,
            'militantCause' => $militantCause
        ]);
    }
}