<?php


// The following script illustrates how to call the get_books_published_after stored procedure:
// suppose we have a stored procedure called 'get_books_published_after'

$published_year = 2010;

// connect to the database and select the publisher
$pdo = require 'connect.php';

$sql = 'CALL get_books_published_after(:published_year)';
$publishers = [];

$statement = $pdo->prepare($sql);
$statement->bindParam(':published_year', $published_year, PDO::PARAM_INT);
$statement->execute();

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

print_r($publishers);

