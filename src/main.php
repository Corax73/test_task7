<?php

namespace App\Classes;

session_start();
include 'config/const.php';
include 'config/captcha.php';

$message = '';
$error = [];
$errorCaptcha['existence'] = false;
$errorCaptcha['text'] = 'Ошибка заполнения капчи.';
$secret = $keyCaptcha;
 
if (!empty($_POST['g-recaptcha-response'])) {
    $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $out = curl_exec($curl);
    curl_close($curl);
    
    $out = json_decode($out);
    if ($out->success == true) {
        $errorCaptcha['existence'] = false;
    } else {
        $errorCaptcha['existence'] = true;
    }
}

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
        header("Location: http://testtask7/personal/");
    } else {
        $error['auth'] = 'Authentication failed';
    }
}
