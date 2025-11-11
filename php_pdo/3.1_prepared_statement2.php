<?php

$pdo = require 'connect.php';

$sql = 'insert into authors(first_name, last_name) values(:first_name, :last_name)';

$statement = $pdo->prepare($sql);

$statement->bindValue(':first_name', 'A', PDO::PARAM_STR);
$statement->bindValue(':last_name', 'B', PDO::PARAM_STR);

$response = $statement->execute();
if ($response) {
        echo "success";
}