<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    if ($password) {
        $hash = password_hash($password, algo:PASSWORD_DEFAULT);
    }
    $statement = "INSERT INTO users(username, password_hash) VALUES(:username, :password_hash)";

    $pdo = require_once 'connect.php';

    $statement = $pdo->prepare($statement);

    $response = $statement->execute([
        ':username' => $username,
        ':password_hash' => $hash
    ]);

    if ($response) {
        echo "Response exists";
    }
}