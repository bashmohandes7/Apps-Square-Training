<?php

namespace Apps\Square\Models;

use Apps\Square\Core\Model;
use PDO;

class User extends Model
{
    function getAllUsers()
    {
        $data = Model::db()->run("SELECT * FROM `users`")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getUser($email, $password)
    {
        $data = Model::db()->run("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?", [$email, $password])->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function addUser($name, $email, $password)
    {
        $data = Model::db()->run("INSERT INTO `users`(`name`,`email`,`password`) VALUES('$name' ,'$email','$password')");
        return $data;
    }
    public function editUser($name, $email, $password, $id)
    {
        $data = Model::db()->update('users', ['name' => $name, 'email' => $email, 'password' => $password], ['id' => $id]);
        return $data;
    }
    public function deleteUser($id)
    {
        $data = Model::db()->deleteById('users', $id);
    }
    public function deleteAllUsers()
    {
        $data = Model::db()->deleteAll('users');
        return $data;
    }
}
