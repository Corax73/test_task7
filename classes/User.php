<?php

namespace App\Classes;

class User
{
    /**
     * saves the new user
     * @param Connect $connect
     * @param string $name
     * @param string $phone
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function saveUser(Connect $connect, string $name, string $phone, string $email, string $password):bool
    {
        $query = 'INSERT INTO `users` (name, phone, email, password) VALUES (:name, :phone, :email, :password)';
        $params = [
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':password' => $password
        ];
        $stmt = $connect->connect(PATH_CONF)->prepare($query);
        $stmt->execute($params);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }
}
