<?php

namespace App\Classes;

session_start();
include 'config/const.php';

$user = new User();
$conn = new Connect();

$data = $user->loadUserData($conn, (integer)$_SESSION['user_id'])[0];
