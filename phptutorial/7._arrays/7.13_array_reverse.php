<?php


// array_reverse() reverses the order of elements in array

// array_reverse ( array $array , bool $preserve_keys = false ) : array

// The array_reverse() doesn’t change the input array. Instead, it returns a new array.

$numbers = [10, 20, 30];
$reversed = array_reverse($numbers);

print_r($reversed); // Array ( [0] => 30 [1] => 20 [2] => 10 )
print_r($numbers); // Array ( [0] => 10 [1] => 20 [2] => 30 )


// The following example uses the array_reverse() function to reverse elements of an array. However, it preserves the keys of the elements
$book = [
	'PHP Awesome',
	999,
	['Programming', 'Web development'],
];

$preserved = array_reverse($book, true);

print_r($preserved);

// Array ( [2] => Array ( [0] => Programming [1] => Web development ) [1] => 999 [0] => PHP Awesome )