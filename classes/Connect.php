<?php

namespace App\Classes;

use PDO;

class Connect
{
    public function connect()
    {
        static $pdo;
        
        if (!$pdo) {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/config/config.php')) {
                $config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
            } else {
                $msg = 'Создайте и настройте config.php';
                trigger_error($msg, E_USER_ERROR);
            }            
            $dsn = 'mysql:dbname='.$config['db_name'].';host='.$config['db_host'];
            $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;
    }
}