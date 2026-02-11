<?php

// what is a transaction in database?

// transaction: a unit of work, performed in a dbms, against a database independent of other transactions, isolated and reliable

require_once "connection.php";


// in this example, both of these insert statements are valid
// so the transaction will take place
// and two new records will be successfully inserted
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $conn->query("INSERT INTO posts (title, body) VALUES ('javascript', 'body about js')");
    $conn->query("INSERT INTO posts (title, body) VALUES ('php', 'body about php')");
    $conn->commit();
} catch (Exception $e) { // this is intentional, NOT PDOException, regular Exception
    $conn->rollBack();
    echo $e->getMessage();
    die('exiting.');
}


// but in this example
// the second insert is incorrect (invalid column names)
// therefore the entire transaction block will be considered false
// and rolled back
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $conn->query("INSERT INTO posts (title, body) VALUES ('some stuff', 'body about some stuff')");
    $conn->query("INSERT INTO posts (author, salary) VALUES ('php', 'body about php')"); // notice the non-existent column names
    $conn->commit();
} catch (Exception $e) { // this is intentional, NOT PDOException, reqgular Exception
    $conn->rollBack();
    echo $e->getMessage();
    die('exiting.');
}


// we can use transactions to group together statements and units of work
// (statements that may depend on one another)
// and with commit() and rollback(), we'll have a finer control
