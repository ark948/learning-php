<?php

// type specifies the amount of memory allocated to a value
// also determines the operations that can be performed on it

// there are three types of types:
// scalar (primitive): boolean, integer, float, string
// compound: array, object
// special: Null, Resource


// the constant PHP_INT_SIZE specifies the size of integer on a specific platform

// int example:
$count = 0;
$max = 1000;


// float example, php uses double-precision floating point numbers
$price = 10.25;

// boolean
$is_admin = true;

// some values can also be converted to true (truthy values)
// 0, 0.0, empty string, "0", empty array or [], null, SimpleXML

// strings
$str = 'some stuff';
$message = "hello";

// compound types
// array
$carts = [ 'laptop', 'mouse', 'keyboard' ];
// to access them:
echo $carts[0] .'<br>'; // 'laptop'
echo $carts[1] .'<br>'; // 'mouse'
echo $carts[2] .'<br>'; // 'keyboard'

// associative arrays:
$prices = [
    'laptop' => 1000,
    'mouse' => 50,
    'keyboard' => 120
];

echo $prices['laptop'] . '<br>'; // 1000
echo $prices['mouse'] . '<br>'; // 50
echo $prices['keyboard'] . '<br>'; // 120

// objects which are instances of a class

// special types: null and resource

$a = null;

// A resource is a special variable that references to an external resource such as:
// a file, a database connection, a network connection

