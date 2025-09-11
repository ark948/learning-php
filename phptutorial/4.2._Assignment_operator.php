<?php


// PHP uses the = to represent the assignment operator.
// When evaluating the assignment operator (=), PHP evaluates the expression on the right side first and assigns the result to the variable on the left side.
$x = 10;
$y = 20;
$total = $x + $y;

echo $total;
// In this example, we assign 10 to $x, 20 to $y, and the sum of $x and $y to $total.

// in php, the assignment expression returns a value assigned, which is the result of expression
// this allows for chain assignment:
$x = $y = 20;
// in this expression, $y = 20, is evaluated first

// Arithmetic assignment operators
$counter = 1;
$counter = $counter + 1;
echo  $counter;

// this can be shorten to:
$counter += 1;

// this feature is also available for all other arithmetic operators

// Concatenation assignment operator
// this operator connects two strings
$greeting = 'Hello ';
$name = 'John';
$greeting = $greeting . $name;

echo $greeting; // Hello John

// By using the concatenation assignment operator you can concatenate two strings and assigns the result string to a variable. 
$greeting = 'Hello ';
$name = 'John';
$greeting .= $name;

echo $greeting; // Hello John