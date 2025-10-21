<?php

// array_pop() to remvoe the an element from the end of an array

// array_pop ( array &$array ) : mixed

// if the input array is empty, this function returns null

// this function modifies the original array

$numbers = [1, 2, 3];

$last_number = array_pop($numbers);
// it will return the popped element

echo $last_number . '<br>'; // 3

print_r($numbers);

// for associative array
$scores = [
    "John" => "A",
    "Jane" => "B",
    "Alice" => "C"
];

$score = array_pop($scores);

echo $score; // C
print_r($scores); // Array ( [John] => A [Jane] => B )

// it removes the last element regardless of the key
// and returns the value of that element which is C