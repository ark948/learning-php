<?php


// anonymous functions are functions that have no name
// anonymous functions will treated as expressions
// and they need to be assigned to a variable to be usable


$multiply = function ($x, $y) {
    return $x * $y;
};

echo $multiply(10, 20);

// if you dump this variable, you'll see that is a Closure object
var_dump($multiply);
/*
object(Closure)#1 (1) {
  ["parameter"]=> array(2) {
    ["$x"]=>string(10) "<required>"
    ["$y"]=>string(10) "<required>"
  }
}
*/

// NOTE: anonymous functions cannot access access any variable outside their own local scope
// to workaround that you need the 'use' construct

$message = 'Hi';
$say = function () use ($message) {
    echo $message;
};

$say(); // Hi

// the $message variable is passed to anonymous function by value not by reference
// therefore the changes inside the function will not affect the $message outside


// to pass variable to the anonymous function by reference use the & operator
$message = 'Hi';
$say = function () use (&$message) {
    $message = 'Hello';
    echo $message . '<br>';
};

// now $message is changed to Hello

// a function can return an anonymous function
function multiplier($x)
{
	return function ($y) use ($x) {
		return $x * $y;
	};
}

$double = multiplier(2);
echo $double(100) . '<br>'; // 200

$tripple = multiplier(3);
echo $tripple(100) . '<br>'; // 300


