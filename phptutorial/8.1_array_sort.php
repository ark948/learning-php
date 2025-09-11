<?php


// we use the sort() to sort array elements in ascending order

// sort() sorts the array in place

// returns true on success, or false on failure

$numbers = [2, 1, 3];
sort($numbers);

print_r($numbers); // 1 2 3


// for strings, it does it alphabetically
$names = ['Bob', 'John', 'Alice'];
sort($names, SORT_STRING);

print_r($names); // Alice Bob John

// the default flag is SORT_REGULAR
// here we used SORT_STRING, to compare string elements

// by default, the sort works case-sensitively, so the capital letters come first
// to sort, case-insensitively, you combine SORT_STRING with SORT_FLAG_CASE
$fruits = ['apple', 'Banana', 'orange'];
sort($fruits, SORT_FLAG_CASE | SORT_STRING);

print_r($fruits); // apple Banana orange


// To sort an array of strings in the “natural ordering”, you combine the SORT_STRING and SORT_NATURAL flags. 
$ranks = ['A-1', 'A-2', 'A-12', 'A-11'];
sort($ranks, SORT_STRING | SORT_NATURAL);

print_r($ranks); // A-1 A-2 A-11 A-12

// The rsort() function is like the sort() function except that it sorts the elements of an array in descending order.

// the following sorts the $ranks array’s elements using the natural ordering in descending order.
$ranks = ['A-1', 'A-2', 'A-12', 'A-11'];
rsort($ranks, SORT_STRING | SORT_NATURAL);

print_r($ranks); // A-12 A-11 A-2 A-1

