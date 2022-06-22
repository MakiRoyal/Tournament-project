<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class UserModel extends Model
{

    public function createUser(string $firstname, string $lastname, string $email, string $password, string $age) 
    {

        $statement = $this->pdo->prepare('INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `age`) VALUES (:firstname, :lastname, :email, :password, :age)');

        $statement->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password,
            'age' => $age
        ]);
    }

    public function loginIn(string $email) {

        $statement = $this->pdo->prepare('SELECT * FROM `user` WHERE `email` = :email');

        $statement->execute([
            'email' => $email,
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
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