<?php

// configure this according to your own mysql setup

// create a database and name it todos (you'll need a user to access it as well)
// add table to it and name it tasks
// tasks table will have three columns, id (pk), name (varchar200), created_at (timestamp)

try {
    $host       = "localhost";
    $dbname     = "todos";
    $user       = "todos";
    $password   = "4.qV06oji4m(oOcg";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "ERROR: " . $e->getMessage() . PHP_EOL;
    die("conn.php error");
}

