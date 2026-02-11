<?php


require_once "connection.php";


$data = $conn->query("SELECT * FROM posts");

echo $data->rowCount() . PHP_EOL;

// to close the connection:
$conn = null;

// $data = $conn->query("SELECT * FROM posts"); // now, this will throw error