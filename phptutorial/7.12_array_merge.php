<?php


// To merge one or more arrays into an array, you use the array_merge() function

// array_merge ( array ...$arrays ) : array

// The array_merge() function appends the elements of the next array to the last element of the previous one

// When the elements in the input arrays have the string keys, the later value for that key will overwrite the previous one

// However, if the array_merge() function will not overwrite the values with the same numeric keys. Instead, 
// it renumbers the numeric keys starting from zero in the result array

// Starting from PHP 7.4.0, you can call the array_merge() function without any arguments. In this case, the function will return an empty array.

$server_side = ['PHP'];

$client_side = ['JavaScript', 'CSS', 'HTML'];

$full_stack = array_merge($server_side, $client_side);

print_r($full_stack);
// Array ( [0] => PHP [1] => JavaScript [2] => CSS [3] => HTML )

// The following example uses the array_merge() function with the array with the string keys
$before = [
	'PHP' => 2,
	'JavaScript' => 4,
	'HTML' => 4,
	'CSS' => 3
];

$after = [
	'PHP' => 5,
	'JavaScript' => 5,
	'MySQL' => 4,
];

$skills = array_merge($before, $after);

print_r($skills);
// Array ( [PHP] => 5 [JavaScript] => 5 [HTML] => 4 [CSS] => 3 [MySQL] => 4 )


