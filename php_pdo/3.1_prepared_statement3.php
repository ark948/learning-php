<?php

$pdo = require 'connect.php';


// To execute a statement whose values of the parameters are evaluated at the time the execute() method runs, you use the bindParam() method
// public PDOStatement::bindParam ( mixed $parameter , mixed &$variable , int $data_type = PDO::PARAM_STR , int $length = ? , mixed $driver_options = ? ) : bool


$sql = 'insert into authors(first_name, last_name) values(:first_name,:last_name)';

$statement = $pdo->prepare($sql);

$author = [
	'first_name' => 'Chris',
	'last_name' => 'Abani',
];

$statement->bindParam(':first_name', $author['first_name']);
$statement->bindParam(':last_name', $author['last_name']);


// Here we change the values before executing the statement
// IMPORTANT: here, the execute() method will evaluate the $author variable at the time of execution, so the values John Boss will be inserted
// change the author variable
$author['first_name'] = 'John';
$author['last_name'] = 'Boss';

// execute the query with value Tom Abate
$response = $statement->execute();
if ($response) {
    echo "query ok";
}