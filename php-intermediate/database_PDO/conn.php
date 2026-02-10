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


$rows = $conn->query("SELECT title, body FROM posts");
while ($row = $rows->fetch()) {
    // fetch will get one record at a time
    echo $row['title'] . PHP_EOL;
}


// another way...
$rows = $conn->query("SELECT title, body FROM posts");
foreach ($rows as $row) {
    echo $row['body'] . PHP_EOL;
}


// records can be fetched in different ways
// as an object, as an associative array, as an index array
// default is an associative array
$rows = $conn->query("SELECT title, body FROM posts");
while ($row = $rows->fetch(PDO::FETCH_OBJ)) {
    // PDO::FETCH_NUM returns enumerated array
    // PDO::FETCH_ASSOC returns associative array
    // PDO::FETCH_OBJ returns object
    var_dump($row);

    // for assoc
    // echo $row['body'] . PHP_EOL;

    // for obj
    echo $row->body . PHP_EOL;
}


