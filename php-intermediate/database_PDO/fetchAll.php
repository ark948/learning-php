<?php

require "connection.php";

$data = $conn->query("SELECT * FROM posts");
// $all = $data->fetchAll();
$all = $data->fetchAll(PDO::FETCH_ASSOC); // much cleaner
// indexes are field names

print_r($all);

// accessing a single record's property, in assoc mode
// example: the body of the second post (which has id of 1)
echo $all['1']["body"] . PHP_EOL;
