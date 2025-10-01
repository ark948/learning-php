<?php


// in larger projects, classes could potentially end up having the same name
// this is called name collision
// to resolve this, php 5.3 introduced namespaces

// Namespaces are a way to group related classes together

// Two classes with the same name cannot exist the same namespaces, but they exist in different namespaces

// Namespaces can also group other identifiers such as functions, constants, variables

// for the rest of this lesson, refer to php_oop > namespaces folder

// It’s customary to assign the src directory the Store namespace. And you can replace Store with your brand name, e.g., Apple.

// after declaring a namespace, you can include the file and use the class (index.php)
// IMPORTANT
// Since the Customer class now is namespaced, you need to use the fully qualified name that includes the namespace

// To avoid using the fully qualified names from a namespace, you can import the namespace with the use operator
// You can also import a class from a namespace instead of importing the namespace.
// individual classes can be imported separately

// if the number of classes is large, you can import all of them in one statement
// use namespace\{className1, className2, ...}

// After adding Databser and Utils folder, we'll be importing two files with the same name, which will cause an error
// to fix this, we can import the namespaces only, then use the filename and class name to instanciate the classes
// or we can use alias for namespaces and import them
// import namespace\className as newClassName;

// To use global classes such as built-in classes or user-defined classes without a namespace,
// you need to precede the name of such classes with a backslash (\).


// The following example shows how to use the built-in DateTime class in the App namespace
namespace App;
$publish_at = new \DateTime();
echo $publish_at->format('Y-m-d H:i:s');
