<?php

// an array is a list of elements
// there are two types of array, indexed arrays, associative arrays

// the keys of an associative array are strings

// to define an indexed array, use array() or []
// [] is known as JSON notation

$empty_array = array();
$scores = array(1, 2, 3);

$scores = [1, 2, 3];

var_dump($scores);

// print_r function can also be used
print_r($scores);


// to access array elements, use the index
echo $scores[0];

// to add elements to an array, use the following syntax
$array_name[] = 4;

$scores = [1, 2, 3];
$scores[] = 4;

print_r($scores);

// it is also possible to add element to an array using idnex
$scores = [1, 2, 3];
$scores[3] = 4;

// elements can be replaced using their index
$scores = [1, 2, 3];
$scores[0] = 0;

print_r($scores);

// to remove an element from an array, use the unset() function and index of the element
$scores = [1, 2, 3];
unset($scores[1]);

print_r($scores); // Array ([0] => 1 [2] => 3)
// NOTE: the entire index will be removed, and the array indexes will not be re-arranged, leaving a gap
// which is a bit weird


// to get the number of elements in an array, use count() function
$scores = [1, 2, 3, 4, 5];

echo count($scores); // 5

