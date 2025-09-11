<?php

// The array_push() function adds one or more elements to the end of an array.

// array_push ( array &$array , mixed ...$values ) : int

// returns the new number of elements in the array
// it modifies the original array


// IMPORTANT
// If you just add one value to an array, you should use the statement $array[] = $value; 
// to avoid the overhead of calling the array_push() function.

$numbers = [1, 2, 3];
array_push($numbers, 4, 5);
print_r($numbers);


// for associative arrays

$roles = [
	'admin' => 1,
	'editor' => 2
];

$roles['approver'] = 3;

print_r($roles);

