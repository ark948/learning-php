<?php


// Associative arrays are arrays that allow you to keep track of elements by names rather than by numbers.

// to create one
$html = array();

// or json notation
$html = [];

// to add elements
$html['title'] = 'PHP Associative Arrays';
$html['description'] = 'Learn how to use associative arrays in PHP';

print_r($html);

// to access elements use the key
echo $html['title']; // PHP Associative Arrays

