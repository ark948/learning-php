<?php


// to insert data into the database, we follow the same path as before

// connect to database
// prepare the proper sql statement
// pass the values and execute the statement

$pdo = require_once 'connect.php';

// insert a single publisher
$name = 'Macmillan';
$sql = 'INSERT INTO publishers(name) VALUES(:name)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':name' => $name
]);

$publisher_id = $pdo->lastInsertId();

echo 'The publisher id ' . $publisher_id . ' was inserted';



// Now to insert multiple rows into the table...

// for this purpose, the execute method needs to be called multiple times

$names = [
	'Penguin/Random House',
	'Hachette Book Group',
	'Harper Collins',
	'Simon and Schuster'
];

$sql = 'INSERT INTO publishers(name) VALUES(:name)';

$statement = $pdo->prepare($sql);

foreach ($names as $name) {
	$statement->execute([
		':name' => $name
	]);
}

