<?php

namespace App;

use PDO;

abstract class Model
{
    private static $pdo;
    private array $config;

    public function __construct()
    {
        $this->config = require __ROOT__."/config/db.php";
        if (!self::$pdo){
            $dsn = "mysql:host={$this->config['host']};dbname={$this->config['name']};charset={$this->config['charset']}";
            self::$pdo = new PDO($dsn, $this->config['user'], $this->config['password'], [

            ]);
        }
    }

}