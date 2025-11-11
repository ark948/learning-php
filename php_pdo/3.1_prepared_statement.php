<?php


$pdo = require 'connect.php';

// prepared statement is a template for executing one or more sql statements with different values
// prepared statements are efficient and help protect against sql injections

// when a database server executes a query, it goes through two stages
// preparation: db server checks the syntax of the statement and initializes server resources for execution stage
// execution: application binds values with the statement and sends to db server, db server executes the statement with the bound values...
// using the resources allocated in preparation stage

// to construct a prepared statement in PDO, first we create a SQL template
$sql = 'insert into authors(first_name, last_name) values(?,?)';

// when passing values to the template, order must be respected

// then we call the prepare() method of the pdo
$statement = $pdo->prepare($sql);
// it returns a new instance of PDOStatement class


// third, we call the execute statement and pass the values to the placeholders
$statement->execute(['Nice', 'Dude']);


// to avoid having to provide values using their index, we can use named placeholders
$sql = 'insert into authors(first_name, last_name) values(:first_name, :last_name)';
$statement = $pdo->prepare($sql);

// but you need to an associative array to pass values to it
// the colon is optional
$statement->execute([
	':first_name' => 'Another',
	':last_name' => 'Guy'
]);

// here the order does not matter, but keys must be correct


// in above examples, we pass values to execute() method, these are called unbound statements
// besides these, PDO also supports bound statements
// they allow us to explicitly bind a value or a variable to a named or positional placeholder
// public PDOStatement::bindValue ( mixed $parameter , mixed $value , int $data_type = PDO::PARAM_STR ) : bool

// it has three parameters:
// $parameter: specifies the parameter name or the index if positional placeholder is used
// $value: the value to bind
// $data_type: specifies the data type for the parameter using PDO constants, default is PDO::PARAM_STR


