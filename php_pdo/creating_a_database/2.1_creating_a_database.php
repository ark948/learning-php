<?php


// the config variables for database connection are in config.php file
// connect.php uses config.php to return a pdo connection instance

// in this file, we can use the require instance to aquire what connect.php returns
$pdo = require 'connect.php';

// var_dump($pdo);

// another way to create a connection is the class-based approach

// then we can use the Connection.php as follows:
$pdo2 = require 'Connection.php';
// var_dump($pdo2);