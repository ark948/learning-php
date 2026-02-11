<?php


require_once "conn.php";

if (isset($_POST['mytask'])) {
    $task = $_POST['mytask'];
    $insert = $conn->prepare("INSERT INTO tasks (name) VALUES (:name)");
    $insert->execute([
        ':name' => $task
    ]);
}

// redirect back to index.php
header('location: index.php');