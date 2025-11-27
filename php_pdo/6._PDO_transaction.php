<?php


// How to perform a database transaction from php by using PDO API.

// to start a transaction in PDO, use PDO::beginTransaction()

// beginTransaction() method turns off the autocommit mode.
// it means that the changes made to database via PDO object will not take effect, until you call PDO::commit() method.
// IMPORTANT

// to roll back the transaction call the PDO::rollback() method

// The PDO::rollback() method rolls back all changes made to the database. Also, it returns the connection to the autocommit mode.

// The PDO::beginTransaction() method throws an exception if the database doesn’t support transactions.


// Example
// Suppose that you need to insert data into three tables: books, authors, and book_authors.

// first we need to check if author exists, if not, we insert it into authors table
// insert the book into the books table
// insert the link between book and author into the book_authors tbale

// we'll put the code in functions.php

// the following get_author_id() finds the author by first and last name and returns id if exists

function get_author_id(\PDO $pdo, string $first_name, string $last_name)
{
	$sql = 'SELECT author_id 
            FROM authors 
            WHERE first_name = :first_name 
                AND last_name = :last_name';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	$statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);

	if ($statement->execute()) {
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		return $row !== false ? $row['author_id'] : false;
	}

	return false;
}


function insert_author(\PDO $pdo, string $first_name, string $last_name): int
{
	$sql = 'INSERT INTO authors(first_name, last_name) 
            VALUES(:first_name, :last_name)';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	$statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
	$statement->execute();

	return  $pdo->lastInsertId();
}


function insert_book(\PDO $pdo, string $title, string $isbn, string $published_date, int $publisher_id): int
{
	$sql = 'INSERT INTO books(title, isbn, published_date, publisher_id) 
            VALUES(:title, :isbn, :published_date, :publisher_id)';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':title', $title, PDO::PARAM_STR);
	$statement->bindParam(':isbn', $isbn, PDO::PARAM_STR);
	$statement->bindParam(':published_date', $published_date, PDO::PARAM_STR);
	$statement->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);
	$statement->execute();

	return  $pdo->lastInsertId();
}


function insert_book_author(\PDO $pdo, int $book_id, int $author_id)
{
	$sql = 'INSERT INTO book_authors(book_id, author_id) 
            VALUES(:book_id, :author_id)';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(':book_id', $book_id, PDO::PARAM_INT);
	$statement->bindParam(':author_id', $author_id, PDO::PARAM_INT);
	$statement->execute();
}


$pdo = require 'connect.php';

$book = [
	'title' => 'Eternal',
	'isbn' => '9780525539766',
	'published_date' => '2021-03-23',
	'publisher_id' => 2,
];

$author = [
	'first_name' => 'Lisa',
	'last_name' => 'Scottoline',
];

try {
	$pdo->beginTransaction();

	// find the author by first name and last name
	$author_id = get_author_id(
		$pdo,
		$author['first_name'],
		$author['last_name']
	);

	// if author not found, insert a new author
	if (!$author_id) {
		$author_id = insert_author(
			$pdo,
			$author['first_name'],
			$author['last_name']
		);
	}

	$book_id = insert_book(
		$pdo,
		$book['title'],
		$book['isbn'],
		$book['published_date'],
		$book['publisher_id']
	);

	// insert the link between book and author
	insert_book_author($pdo, $book_id, $author_id);

	// commit the transaction
	$pdo->commit();
} catch (\PDOException $e) {
	// rollback the transaction
	$pdo->rollBack();

	// show the error message
	die($e->getMessage());
}