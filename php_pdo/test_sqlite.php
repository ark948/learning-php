<?php

// there are two ways to connect to sqlite
// 1. using SQLite3 class
// 2. Using PDO


// using SQlite3
try {
    $db = new SQLite3('../test.db');
    echo "Sqlite is working";
} catch (Exception $e) {
    echo $e->getMessage();
}


// using PDO
$dbPath = __DIR__ . '/../db.sqlite';
try {
    $pdo = new PDO("sqlite:$dbPath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Database error:" . htmlspecialchars($e->getMessage());
}
