<?php


// PHP 7.4 introduced arrow functions that provide a more concise syntax for the anonymous functions.

// unlike anonymous functions, arrow functions can access variables from parent scope

// here be the syntax
// fn (arguments) => expression;


$eq = fn ($x, $y) => $x == $y;

echo $eq(100, '100');

// arrow functions can be passed to other functions
// one good example is the array_map() function that accepts a callback and an array
// then it will apply the callback on the items of the array
// and returns a new array
$list = [10, 20, 30];
$results = array_map( fn ($item) => $item * 2, $list );


// arrow functions can also be returned
function multiplier($x)
{
	return fn ($y) => $x * $y;
}

$double = multiplier(2);
echo $double(10);

