<?php

// to remove an element from the beginning of an array use array_shift()

// it removes and returns the first element of array
// if array is empty or is not an array, it returns null

// the numerical array keys are modified starting from 0

$numbers = [1, 2, 3];
$first_number = array_shift($numbers);

print_r($numbers);
// Array
// (
//     [0] => 2
//     [1] => 3
// )


// sinec this function needs to reindex the array after removing the first element
// it is very slow if array is large

// for associative arrays

$scores = [
    "John" => "A",
    "Jane" => "B",
    "Alice" => "C"
];

$score = array_shift($scores);

echo $score . '<br>'; // A
print_r($scores);
// Array ( [Jane] => B [Alice] => C )
// the keys are preserved

