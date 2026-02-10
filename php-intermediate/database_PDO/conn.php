<?php


// configure this according to your own (phpmyadmin + mysql)
try {
    $host       = "localhost";
    $dbname     = "blogpost";
    $user       = "blogpost";
    $password   = "zFZaaC[AXGZJmw_o";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "db ok" . PHP_EOL;
} catch(PDOException $e) {
    echo $e->getMessage();
    die("db error");
}


$rows = $conn->query("select title from posts");
while ($row = $rows->fetch()) {
    echo $row['title'] . PHP_EOL;
}