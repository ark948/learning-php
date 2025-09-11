<?php


// function parameters can have default values
// in whicih case if they are not provided, the default value will be used

function concat($str1, $str2, $delimiter = ' ')
{
    return $str1 . $delimiter . $str2;
}

$message = concat('Hi', 'there!'); // Hi there!

// those arguments can still be provided
$message = concat('Hi', 'there!', ','); // Hi,there!

// IMPORTANT
// The default arguments must be constant expressions. They cannot be variables or function calls.
// PHP allows you to use a scalar value, an array, and null as the default arguments.

// it is recommended to place default parameters at the end of the parameters list
