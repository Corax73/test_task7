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
}
