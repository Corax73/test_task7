<?php

namespace App\Classes;

use App\Classes\Connect;
use PDO;

$conn = new Connect();
$path = 'config/config.php';
$error = [];

if(!empty($_POST)) {
    if ($_POST['password'] == $_POST['passwordConfirm']) {
        $name = trim(stripslashes(htmlspecialchars($_POST['name'])));
        $phone = trim(stripslashes(htmlspecialchars($_POST['phone'])));
        $email = trim(stripslashes(htmlspecialchars($_POST['email'])));

        $password = $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = 'INSERT INTO `123` (name, phone, email, password) VALUES (:name, :phone, :email, :password)';
        $params = [
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':password' => $password
        ];
        $stmt = $conn->connect($path)->prepare($query);
        $stmt->execute($params);
    } else {
        $error['password'] = 'Password mismatch';
    }
}
