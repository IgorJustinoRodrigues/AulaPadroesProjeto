<?php

namespace App\core;

use PDO;

class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../../config.php';
            $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8";
            self::$instance = new PDO($dsn, $config['user'], $config['password']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
