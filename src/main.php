<?php

namespace App\Classes;

session_start();
include 'config/const.php';

$message = '';
$error = [];

if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['passwordConfirm']))) {
    if ($_POST['password'] == $_POST['passwordConfirm']) {
        $cleaning = new InputCleaning();
        
        $name = $cleaning->clean($_POST['name']);
        $phone = $cleaning->clean($_POST['phone']);
        $email = $cleaning->clean($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User();
        $conn = new Connect();
        $check = new UniquenessCheck();
        if ($check->checkName($conn, $name)) {
            return $error['name'] = 'Name is not unique!';
        }
        if ($check->checkEmail($conn, $email)) {
            return $error['email'] = 'Email is not unique!';
        }
        if ($check->checkPhone($conn, $phone)) {
            return $error['phone'] = 'Phone is not unique!';
        }

        $registration = $user->saveUser($conn, $name, $phone, $email, $password);
        if ($registration) {
            $message = 'Congratulations! You have registered!';
        } else {
            $message = 'Try again.';
        }
    } else {
        $error['passwordMismatch'] = 'Password mismatch';
    }
} else {
    foreach ($_POST as $key => $input) {
        if (empty($input)) {
            $error[$key] = 'The field ' . $key . ' must not be empty!';
        }
    }
}

if(!empty($_POST['login']) && !empty($_POST['passwordForLogin'])) {
    $cleaning = new InputCleaning();

    $login = $cleaning->clean($_POST['login']);
    
    $password = $_POST['passwordForLogin'];
    $conn = new Connect();
    $user = new User();
    $auth = $user->authUser($conn, $login, $password);

    if ($auth) {
        header("Location: http://testtask7/personal_page.php");
    }

    print_r($_SESSION);
}
