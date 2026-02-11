<?php


require "connection.php";

$data = $conn->query("SELECT * FROM posts");
$one = $data->fetchColumn(); // returns a single column: 1 (the id of first post)
echo $one . PHP_EOL;


// if using PDOStatement::fetchColumn(),
// you need to repeat the query, since it only returns one single column


$data = $conn->query("SELECT * FROM posts");
$one = $data->fetchColumn(1); // the title of first post
echo $one . PHP_EOL;


$data = $conn->query("SELECT * FROM posts");
$one = $data->fetchColumn(2); // the body of first post
echo $one . PHP_EOL;


$data = $conn->query("SELECT * FROM posts");
$one = $data->fetchColumn(3); // the date of first post
echo $one . PHP_EOL;


