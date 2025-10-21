<?php


// you’ll learn how to use the PHP list syntax to assign multiple variables in one operation

$prices  = [100, 0.1];

// to assign each element of $prices array to variables you can do this:
$buy_price = $prices[0];
$tax = $price[1];


// there is a more intuitive way to do this
// PHP provides the list() construct that assigns the elements of an array to a list of variables in one assignment
list($buy_price, $tax) = $prices;

var_dump( $buy_price, $tax );
// int(100)
// float(0.1)

// array() and list() are not functions, but language construct

// The following example uses the list to assign the first and the third element to variables. It skips the second element
$prices = [100, 0.1, 0.05];

list($buy_price, , $discount) = $prices;

// The following example uses the nested list to assign the array’s elements to the variables
$elements = ['body', ['white','blue']];
list($element, list($bgcolor, $color)) = $elements;


// Starting from PHP 7.1.0, you can use the list construct to assign elements of an associative array to variables.
$person = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'age' => 25
];

list( 'first_name' => $first_name, 'last_name' => $last_name, 'age' => $age) = $person;
var_dump($first_name, $last_name, $age);


