<?php


require_once "connection.php";


// update
$newTitle = "Title #1";
$id = 1;
$update = $conn->prepare("UPDATE posts SET title=:title WHERE id=:id");

try {
    $update->execute(array(
        ":title" => $newTitle,
        ":id" => $id
    ));
    echo "OK".PHP_EOL;
} catch (PDOException $e) {
    echo "There was an error: " . $e->getMessage() . PHP_EOL;
    die("EXITING...");
}


// delete
$id = 4;
$delete = $conn->prepare("DELETE FROM posts WHERE id=:id");
$delete->execute([
    ":id" => $id
]);

