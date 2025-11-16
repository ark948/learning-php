<?php


// the IN operator returns true if a value is in a set of values.
// can be used in where clause of select, update, delete


$sql = 'SELECT book_id, title
        FROM books
        WHERE book_id IN (?,?,?)';


$statement = $pdo->prepare($sql);
$statement->execute([1,2,3]);


// in practice, the size of list is dynamic and we may not know it in advance

// here is a useful function to construct a sql statement based on the number of elements in the array

/**
* Return an array of books with the book id in the $list
*/
function get_book_list(\PDO $pdo, array $list): array
{
    // count the number of elements inside list, then repeat the '?,' string that number of times minus one
    // or in another way:
    // generate a list of the placeholders (?) based on the number of elements in the $list array
    $placeholder = str_repeat('?,', count($list) - 1) . '?';

    $sql = "SELECT book_id, title 
            FROM books 
            WHERE book_id in ($placeholder)";

    $statement = $pdo->prepare($sql);
    $statement->execute($list);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


// connect to database
$pdo = require 'connect.php';

// get a list of books
$books = get_book_list($pdo, [1, 2, 3]);

print_r($books);

// this function accepts a PDO object, and an array of ids
// it returns an array of books

