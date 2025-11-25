<?php


// suppose we have a publishers table
// and a Publisher class

namespace phptutorial;
class Publisher
{
    private $publisher_id;
    private $name;
}

// to fetch each row from publishers table and return it as a Publisher object...
// use the fetchObject() method

/*
public function fetchObject(
    string|null $class = "stdClass", 
    array $constructorArgs = []
): object|false
*/

// the first param is the class object to return
// if omitted, will return object of stdClass

// constructorArgs is an array that specifies the args passed to constructor of class

// fetchObject first assigns the column value to a property with the same name
// then calls __set() magic method, if class has no __set(), it will create a public property with that value

$pdo = require 'connect.php';
$sql = 'SELECT publisher_id, name 
        FROM publishers 
        WHERE publisher_id=:publisher_id';

$statement = $pdo->prepare($sql);
$statement->execute([':publisher_id' => 2]);

// fetch the row into the Publisher object
$publisher = $statement->fetchObject('Publisher');

var_dump($publisher);


// IMPORTANT
// if Publisher class has a namespace, you need pass the fully qualified name
// here, i added the namespace phptutorial to top of the Publisher class.
// then update the fetch statement to the following:
$publisher = $statement->fetchObject('phptutorial\Publisher');