<?php


// fetchColumn() is used to get the value of a single column from the next row of result set.

// syntax
// public PDOStatement::fetchColumn(int $column = 0): mixed

// index of the first column is zero

// fetchColumn() returns the value of the first column if no column index is provided

// IMPORTANT
// if the result has no more rows, the method returns false
// for this reason, DO NOT use this method to aquire the values of Boolean columns


// The following example uses the fetchColumn() method to get the name of the publisher with id 1
$pdo = require 'connect.php';

$sql = 'SELECT name 
        FROM publishers 
        WHERE publisher_id = :publisher_id';

$statement = $pdo->prepare($sql);
$statement->execute(
    ['publisher_id' => 1]
);


$publisher_name = $pdo->fetchColumn();
echo $publisher_name;
// get the name of the publisher from the selected row using the fetchColumn() method and display it

// In practice, you will use the fetchColumn() to look up a value based on a unique id. 
// For example, you can use the fetchColumn() method to check whether an email already exists in the users table:
// SELECT id FROM users WHERE email := email;
// If the result is false, it means that the email doesn’t exist.

