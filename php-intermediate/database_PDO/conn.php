<?php


// configure this according to your own (phpmyadmin + mysql)

$host = "localhost";
$dbname = "blogpost";
$user = "blogpost";
$password = "zFZaaC[AXGZJmw_o";

$conn = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$password");
if ($conn == true) {
    echo "db ok";
} else {
    echo "db NOT ok";
}

