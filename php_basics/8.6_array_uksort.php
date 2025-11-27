<?php


// The uksort() function allows you to sort an array by key using a user-defined comparison function.
// Typically, you use the uksort() function to sort the keys of an associative array.


// The following example shows how to use the uksort() function to sort the keys of the $name array case-insensitively:
$names = [
    'c' => 'Charlie',
    'A' => 'Alex',
    'b' => 'Bob'
];

uksort(
    $names, 
    fn ($x, $y) => strtolower($x) <=> strtolower($y)
);

print_r($names);

/*
Array
(
    [A] => Alex
    [b] => Bob
    [c] => Charlie
)
*/