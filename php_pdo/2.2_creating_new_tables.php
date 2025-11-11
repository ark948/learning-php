<?php

// to create new table, we use the CREATE TABLE statement

// we can execute sql statements using the exec() method of PDO instnace
// it returns the number of affected rows on success, or false on failure

$statements = [
	'CREATE TABLE IF NOT EXISTS authors( 
        author_id   INT AUTO_INCREMENT,
        first_name  VARCHAR(100) NOT NULL, 
        middle_name VARCHAR(50) NULL, 
        last_name   VARCHAR(100) NULL,
        PRIMARY KEY(author_id)
    );',
	'CREATE TABLE IF NOT EXISTS book_authors (
        book_id   INT NOT NULL, 
        author_id INT NOT NULL, 
        PRIMARY KEY(book_id, author_id), 
        CONSTRAINT fk_book 
            FOREIGN KEY(book_id) 
            REFERENCES books(book_id) 
            ON DELETE CASCADE, 
            CONSTRAINT fk_author 
                FOREIGN KEY(author_id) 
                REFERENCES authors(author_id) 
                ON DELETE CASCADE
    )'
];


$pdo = require 'connect.php';

// execute sql statements (there are two of them)
foreach ($statements as $statement) {
    $response = $pdo->exec($statement);
    if ($response) {
        echo "success";
    }
}