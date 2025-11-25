<?php


// use the PDO::FETCH_CLASS mode to fetch data into an object of a class.

// suppose thre is a books table

// and a Book class
class Book
{
}

// Each row in the books table can map to an instance of the Book class.
// To select data from the books table and map the columns to the properties of a Book object, you can use the PDO::FETCH_CLASS mode.

$pdo = require 'connect.php';

$sql = 'SELECT book_id, title, isbn, published_date
        FROM books
        WHERE book_id = :book_id';

$statement = $pdo->prepare($sql);
$statement->execute([':book_id' => 1]);
$statement->setFetchMode(PDO::FETCH_CLASS, 'Book'); // IMPORTANT
$book = $statement->fetch();
var_dump($book);


// Note that if the Book class doesn’t exist, PDO will return an array instead of an object.

// PDO::FETCH_CLASS uses the following rules
// if Book has a property with the same name as the column name, the value will be assigned
// if not, php will call __set() method
// if Book has no __set(), a public property will be created for it

// The following example shows how to use the PDO::FETCH_CLASS mode to select data from the books table and return an array of Book objects:
$pdo = require 'connect.php';
$sql = 'SELECT book_id, title, isbn, published_date
        FROM books';
$books = $statement->query()->fetchAll(PDO::FETCH_CLASS, 'Book');
var_dump($books);


// The following example illustrates how to select one row from the books table and return a new instance of the Book class:
class Book
{
    private $book_id;
    private $title;
    private $isbn;
    private $published_date;
    public function __set($name, $value)
    {
        // empty
    }
}

$pdo = require 'connect.php';
$sql = 'SELECT 
            book_id, 
            title, 
            isbn, 
            published_date, 
            publisher_id
        FROM books
        WHERE book_id = :book_id';
$statement = $pdo->prepare($sql);
$statement->execute([':book_id' => 1]);
$statement->setFetchMode(PDO::FETCH_CLASS, 'Book');
$book = $statement->fetch();
var_dump($book);

/*
In this example, the Book class has four private properties and an empty __set() magic method.
Since the book_id, title, isbn, and published_date properties match with the columns from the selected row, PHP assigns the column values to these properties.
However, the Book class doesn’t have the publisher_id property. In this case, PDO calls the __set() method of the Book class.
Because the __set() method doesn’t have any logic, PDO doesn’t assign the value from the publisher_id column to the Book object.
*/

// by default, PDO assigns column values to object properties before calling constructor

// To instruct PDO to call the constructor before assigning column values to object properties, you combine the PDO::FETCH_CLASS with PDO::FETCH_PROPS_LATE flag.
class Book
{
    public function __construct()
    {
        if (isset($this->isbn)) {
            echo 'ISBN:' . $this->isbn;
        }
        echo 'ISBN has not assigned yet.';
    }
}

$pdo = require 'connect.php';

$sql = 'SELECT book_id, title, isbn, published_date, 
        FROM books
        WHERE book_id = :book_id';

$statement = $pdo->prepare($sql);
$statement->execute([':book_id' => 1]);
$statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Book');
$book = $statement->fetch();

var_dump($book);

