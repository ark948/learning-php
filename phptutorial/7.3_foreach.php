<?php


// PHP provides foreach statement that allows you to iterate over elements of an array, indexed array or an associative array.

// basic syntax
foreach ($array_name as $element) {
    // process element here
    echo 'stuff';
}


$colors = ['red', 'green', 'blue'];
foreach ($colors as $color) {
	echo $color . '<br>';
}

// red
// green
// blue

// to use with an associative array
foreach ($array_name as $key => $value) {
    //process element here;
    echo 'stuff';
}

$capitals = [
	'Japan' => 'Tokyo',
	'France' => 'Paris',
	'Germany' => 'Berlin',
	'United Kingdom' => 'London',
	'United States' => 'Washington D.C.'
];

foreach ($capitals as $country => $capital) {
	echo "The capital city of $country is $capital" . '<br>';
}

// The capital city of Japan is Tokyo
// The capital city of France is Paris
// The capital city of Germany is Berlin
// The capital city of United Kingdom is London
// The capital city of United States is Washington D.C.