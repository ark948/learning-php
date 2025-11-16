<?php


// The LIKE operator returns true if a character string matches a specified pattern. 
// this pattern typically could include:
// % matches any string of zero or more characters (wildcard)
// _ matches any single character

// For example, the %er% will match any string that contains the string er, e.g., peter, understand, etc.

// LIKE operator could be used in where clause of select, update and delete

// first of all, we need to construct the proper statement
$sql = 'SELECT book_id, title 
        FROM books 
        WHERE title LIKE :pattern';

// And then bind the string '%es%' to the prepared statement.

/**
* Find books by title based on a pattern
*/
function find_book_by_title(\PDO $pdo, string $keyword): array
{
    $pattern = '%' . $keyword . '%';

    $sql = 'SELECT book_id, title 
        FROM books 
        WHERE title LIKE :pattern';

    $statement = $pdo->prepare($sql);
    $statement->execute([':pattern' => $pattern]);

    return  $statement->fetchAll(PDO::FETCH_ASSOC);
}


// connect to the database
$pdo = require 'connect.php';

// find books with the title matches 'es'
$books = find_book_by_title($pdo, 'es');

foreach ($books as $book) {
    echo $book['title'] . '<br>';
}

// this function will return books that their title matches the $keyword
