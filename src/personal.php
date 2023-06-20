<?php

namespace App\Classes;

use App\Classes\User;
use App\Classes\Connect;

session_start();
include '../config/const.php';

$user = new User();
$conn = new Connect();
$user_id = (integer)$_SESSION['user_id'];
$data = $user->loadUserData($conn, $user_id);

if(!empty($_POST['name']) || !empty($_POST['phone']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['passwordConfirm'])) {
    if ($_POST['password'] != $_POST['passwordConfirm']) {
        $error['passwordMismatch'] = 'Password mismatch';
        return $error;
    }
    $cleaning = new InputCleaning();
    $newData = [];
    foreach ($_POST as $key=>$value) {
        if (!empty($value)) {
            $value = $cleaning->clean($value);
            $newData[$key] = $value;
        }
    }

    $update = $user->updateUser($conn, $newData, $user_id);
    if ($update) {
        $message = 'Congratulations! You have update!';
    } else {
        $message = 'Try again.';
    }
}
