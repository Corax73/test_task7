<?php

namespace App\Classes;

use PDO;

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

    /**
     * user authentication check
     * @param Connect $connect
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function authUser(Connect $connect, string $login, string $password):bool
    {
        $query = "SELECT * FROM `users` WHERE email = :email";
        $params = [
            ':email' => $login
        ];
        $stmt = $connect->connect(PATH_CONF)->prepare($query);
        $stmt->execute($params);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($row) == 1) {
            if (password_verify($password, $row[0]['password'])) {
                $_SESSION['user_id'] = $row[0]['id'];
                $_SESSION['login'] = $row[0]['name'];
                return true;
            } else {
                return false;
            }
        } else {
            $query = "SELECT * FROM `users` WHERE phone = :phone";
            $params = [
                ':phone' => $login];
                $stmt = $connect->connect(PATH_CONF)->prepare($query);
                $stmt->execute($params);
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($row) == 1) {
                    if (password_verify($password, $row[0]['password'])) {
                        $_SESSION['user_id'] = $row[0]['id'];
                        $_SESSION['login'] = $row[0]['name'];
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
        }
    }
}
