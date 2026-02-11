<?php


// configure this according to your own (phpmyadmin + mysql)
try {
    $host       = "localhost";
    $dbname     = "blogpost";
    $user       = "blogpost";
    $password   = "5G*[q5t)77yjdXux";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "db ok" . PHP_EOL;
} catch(PDOException $e) {
    echo $e->getMessage();
    die("db error");
}