<?php


// selecting data is also referred to as querying data

// it's done using the query method or prepared statement

// IMPORTANT
// if query does not have any params, you can use the query() method
// if your query accepts one or more params, you should use prepared statement for security reasons

// in case of an error, query() method returns false, otherwise PDOStatement object

// The following illustrates how to query all rows from the publishers table in the bookdb database

$pdo = require 'connect.php';

$sql = 'SELECT publisher_id, name 
		FROM publishers';

$statement = $pdo->query($sql);

// get all publishers
$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($publishers) {
	// show the publishers
	foreach ($publishers as $publisher) {
		echo $publisher['name'] . '<br>';
	}
}

// using PDO::FETCH_ASSOC mode, the PDOStatement returns an associative array of elements 
// in which the key of each element is the column name of the result set


// another way is to use prepared statement
$publisher_id = 1;
$sql = 'SELECT publisher_id, name 
		FROM publishers
        WHERE publisher_id = :publisher_id';

$statement = $pdo->prepare($sql);
$statement->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);
$statement->execute();
$publisher = $statement->fetch(PDO::FETCH_ASSOC);

if ($publisher) {
	echo $publisher['publisher_id'] . '.' . $publisher['name'];
} else {
	echo "The publisher with id $publisher_id was not found.";
}