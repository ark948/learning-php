<?php


require 'config.php';

// PDO_MYSQL driver implements PDO interface.
// to check if it is enabled, go to php.ini file
// usually in xampp folder

// look for ;extension=php_pdo_mysql.dll, or something like that
// uncomment it by removing the semi-colon
// (the web server needs to be restarted)

// PDO uses something called DSN (data source name) that contains the following info:
// db server host, db name, user, password, other params such as character set

// PDO uses these info to make a connection to database server
// "mysql:host=host_name;dbname=db_name;charset=UTF8"

// example
// $dsn = "mysql:host=localhost;dbname=bookdb;charset=UTF8";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
    if ($pdo) {
        echo "Connected to database successfully";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
