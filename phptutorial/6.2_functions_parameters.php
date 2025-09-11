<?php


// a function can have zero or more parameters

// they can be separated using comma ,

function concat($str1, $str2)
{
    return $str1 . $str2;
}

$greeting = concat('Welcome ', 'Admin');
echo $greeting;

// if the number of provided arguments and function parameters do not match (e.g. is less than), php will raise a fatal error

// since php 7.0, the provided arguments can have a trailing comma, which will be ignored
$greeting = concat(
	'Welcome ',
	'Home', // this comma will be ignored
);

// trailing comma can also placed in parameter list in function definition

// By default, arguments are passed by values in PHP. (a copy of them are sent to function, not the original variable)

$counter = 1;
function increase($value)
{
	$value+= 1;
	echo $value. '<br>'; // 2
}

// increase the counter
increase($counter); // 2
echo $counter . '<br>'; // 1 // the original variable is still 1

// If you want a function to change its arguments, you must pass them by reference.
// To pass an argument by reference, you prepend the operator (&) to the parameter name in the function definition
$counter = 1;
function increase2( &$value )
{
    $value += 1;
    echo $value . '<br>';
}

increase2($counter);
echo $counter; // 2

