<?php


// fetchAll() method is similar to fetc() but it fetches all results from a PDOStatement

// syntax
// public function fetchAll(int $mode = PDO::FETCH_DEFAULT): array

// here are the mods
// PDO::FETCH_BOTH – returns an array indexed by both column name and 0-indexed column number. This is the default.
// PDO::FETCH_ASSOC – returns an array indexed by column name
// PDO::FETCH_CLASS – returns a new class instance by mapping the columns to the object’s properties.


// IMPORTANT
// if the result is a large set, fetchAll() will consume a lot of server memory and network resources
// use it with caution

// The following example illustrates how to use the fetchAll() method to select all rows from the publishers table

// connect to the database to get the PDO instance
$pdo = require 'connect.php';

$sql = 'SELECT publisher_id, name 
        FROM publishers';

$statement = $pdo->query($sql);

// fetch all rows
$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

// display the publisher name
foreach ($publishers as $publisher) {
    echo $publisher['name'] . '<br>';
}

echo "---------------";

// using fetchAll() with a prepared statement
$sql = 'SELECT publisher_id, name 
        FROM publishers
        WHERE publisher_id > :publisher_id';

// execute a query
$statement = $pdo->prepare($sql);
$statement->execute([
    ':publisher_id' => 2
]);
// fetch all rows
$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

// display the publishers
foreach ($publishers as $publisher) {
    echo $publisher['publisher_id'] . '.' . $publisher['name'] . '<br>';
}