<?php


// the fetch() method of the PDOStatement() allows for fetching a row from a result set
// internally it fetches a single row, then moves the internal pointer to the next row.
// therefore, subsequent fetch calls, will return the next row in the set

// to fetch all results one by one, fetch() can be used with while loop

/*
// this is the syntax of fetch() method
public function fetch(
    int $mode = PDO::FETCH_DEFAULT, 
    int $cursorOrientation = PDO::FETCH_ORI_NEXT, 
    int $cursorOffset = 0
): mixed
*/

// the mode parameter, accepts the following constants to determine how to return the next row
// PDO::FETCH_BOTH – returns an array indexed by both column name and 0-indexed column number.
// PDO::FETCH_ASSOC – returns an array indexed by column name
// PDO::FETCH_CLASS – returns a new class instance by mapping the columns to the object’s properties.

// fetch() returns the value depending on mode, and false on failure

// Using fetch() with query()
// we typically use the query to execute a select statement
// then we use the fetch() to get the desired result

// The following example shows how to use the fetch() method to select each row from the books table:

$pdo = require "connect.php";

// execute a query
$sql = 'SELECT book_id, title FROM books';
$statement = $pdo->query($sql);

// fetch the next row
while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
    echo $row['title'] . "<br>";
}
// fetch each row from the result set until there’s no more row to fetch and display the book title in each iteration.


// Another example
// The following example shows how to fetch() to fetch a book from the books table with publisher id 1
$sql = 'SELECT book_id, title 
        FROM books 
        WHERE publisher_id =:publisher_id';

// prepare the query for execution
$statement = $pdo->prepare($sql);

// execute the query
$statement->execute([
    ':publisher_id' => 2
]);

// fetch the next row
while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
    echo $row['title'] . PHP_EOL;
}