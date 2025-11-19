<?php


// deleting one or more rows is similar to before

// connect, prepare, execute

$publisher_id = 1;

// connect to the database and select the publisher
$pdo = require 'connect.php';

// construct the delete statement
$sql = 'DELETE FROM publishers
        WHERE publisher_id = :publisher_id';

// prepare the statement for execution
$statement = $pdo->prepare($sql);
$statement->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);

// execute the statement
if ($statement->execute()) {
	echo 'publisher id ' . $publisher_id . ' was deleted successfully.';
}



// Deleting multiple rows
// the process is almost as same as previous

// To find the number of rows deleted, you use the rowCount() method of the PDOStatement object.

$publisher_id = 3;

$sql = 'DELETE FROM publishers
        WHERE publisher_id > :publisher_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);

if ($statement->execute()) {
	echo $statement->rowCount() . ' row(s) was deleted successfully.';
}

