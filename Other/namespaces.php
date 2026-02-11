<?php


// namespaces help with Code Organization and Name Collision Avoidance


// to declare a namespace, we use the namespace keyword followed by a name for it
namespace MyProject;

class MyClass
{}

// to access classes, functions or ... within a namepsace, we refer to their namespace and name fully using the use keyword
// (defining namespace and using it in the same file may cause some errors, we do it for teaching purposes)
use MyProject\MyClass;
$obj = new MyClass();

// Namespaces can have sub-namespaces, allowing for even finer organization.
namespace MyProject\SubNameSpace;

// If a class, function, or constant is not defined within a namespace, 
// it belongs to the global namespace. These can be accessed using the backslash character before their names.
$globalClass = new \GlobalClass();


// Here is a example of using namespaces
// File: MyProject/Database/Connection.php
namespace MyProject\Database;

class Connection {
    // Connection code
}

// File: index.php
require 'MyProject/Database/Connection.php';

use MyProject\Database\Connection;

$db = new Connection();