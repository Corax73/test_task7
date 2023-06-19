<?php

namespace App\Classes;

use PDO;

class UniquenessCheck
{
    /**
     * checking the entered name for uniqueness
     * @param Connect $connect
     * @param string $name
     * @return bool
     */
    public function checkName(Connect $connect, string $name):bool
    {
        $query = "SELECT * FROM `users` WHERE name = :name";
        $params = [
            ':name' => $name
        ];
        $stmt = $connect->connect(PATH_CONF)->prepare($query);
        $stmt->execute($params);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($row) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * checking the entered email for uniqueness
     * @param Connect $connect
     * @param string $email
     * @return bool
     */
    public function checkEmail(Connect $connect, string $email):bool
    {
        $query = "SELECT * FROM `users` WHERE email = :email";
        $params = [
            ':email' => $email
        ];
        $stmt = $connect->connect(PATH_CONF)->prepare($query);
        $stmt->execute($params);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($row) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * checking the entered phone for uniqueness
     * @param Connect $connect
     * @param string $phone
     * @return bool
     */
    public function checkPhone(Connect $connect, string $phone):bool
    {
        $query = "SELECT * FROM `users` WHERE phone = :phone";
        $params = [
            ':phone' => $phone
        ];
        $stmt = $connect->connect(PATH_CONF)->prepare($query);
        $stmt->execute($params);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($row) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
