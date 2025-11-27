<?php


// The asort() function sorts the elements of an associative array in ascending order. 
// Unlike other sort functions, the asort() function maintains the index association.

$mountains = [
    'K2' => 8611,
    'Lhotse' => 8516,
    'Mount Everest' => 8848,
    'Kangchenjunga' => 8586,
];
asort($mountains);

print_r($mountains);
/*
Array
(
    [Lhotse] => 8516
    [Kangchenjunga] => 8586
    [K2] => 8611
    [Mount Everest] => 8848
) 
*/



// To sort an associative array in descending order and maintain the index association, you use the arsort()
$mountains = [
    'K2' => 8611,
    'Lhotse' => 8516,
    'Mount Everest' => 8848,
    'Kangchenjunga' => 8586,
];
arsort($mountains);

print_r($mountains);


