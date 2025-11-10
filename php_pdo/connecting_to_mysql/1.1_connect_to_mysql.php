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


// PDO supports three different error handling strategies:
// PDO::ERROR_SILENT, default
// using PDO::errorCode() and PDO::errorInfo() we can inspect the error

// PDO::ERRMODE_WARNING
// will issue an E_WARNINGG message

// PDO::ERRMODE_EXCEPTION
// will raise a PDOExcpetion

// to set the error handling strategy, pass an associative array to PDO constructor
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// or use the setAttribute() method of pdo instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// common issues that may occur

// could not find driver
// MySQL driver is not enabled in php.ini file

// SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES)
// password was incorrect

// SQLSTATE[HY000] [1049] Unknown database 'bookdb'
// database does not exist or the its name is incorrect

// SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo failed: No such host is known.
// invalid database host name