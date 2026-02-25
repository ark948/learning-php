<?php

namespace App\Core;

use PDOException;
use PDO;

class Database {
    private static $pdo;
    public static function connect(): mixed {
        // self is used to refer to the current class itself (use for static members)
        // $this is used to refer to member variables (use for non-static members)
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO(dsn: "mysql:host=localhost;dbname=myapi;", username: "myapi", password: "123");
            } catch (PDOException $e) {
                die("something is wrong with DB connection." . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}