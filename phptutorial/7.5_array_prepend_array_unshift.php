<?php

// to prepend one or more elements to the beginning of the array use array_unshift() function

// array_unshift ( array &$array , mixed ...$values ) : int

// this function returns the new number of elements in the array
// it modifies the original array
// it preserves the prepended elements

// it changes the indexes to start from zero

$permissions = [
	'edit',
	'delete',
	'view'
];

array_unshift($permissions, 'new');

print_r($permissions);
// Array
// (
//     [0] => new
//     [1] => edit
//     [2] => delete
//     [3] => view
// )


// it is possible to prepend multiple items
$permissions = [
	'edit',
	'delete',
	'view'
];

array_unshift($permissions, 'new', 'approve', 'reject');

print_r($permissions);
// Array
// (
//     [0] => new
//     [1] => approve
//     [2] => reject
//     [3] => edit
//     [4] => delete
//     [5] => view
// )


// to prepend an element to an associative array, use the + operator
$colors = [
	'red' => '#ff000',
	'green' => '#00ff00',
	'blue' => '#0000ff',
];

$colors = ['black' => '#000000'] + $colors;

