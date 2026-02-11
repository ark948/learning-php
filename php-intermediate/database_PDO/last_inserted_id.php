<?php

require_once "connection.php";

$title = "title 5";
$body = "body of post 5";

$insert = $conn->prepare(
    "INSERT INTO posts (title, body) VALUES (:title, :body)"
);

// now bind the handlers (or execute and bind at once)
$insert->execute(array(
    ':title' => $title,
    ':body' => $body
));


// getting the last inserted id
echo "Last inserted ID: " . $conn->lastInsertId() . PHP_EOL;