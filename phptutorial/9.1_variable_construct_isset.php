<?php


// PHP isset() returns true if a variable is set and not null.


// The isset() is a language construct, not a function.
// Therefore, you cannot assign it to a variable, return it from a function, or call it dynamically via a variable function.

// but this workaround is ok
function isset_and_not_null($var): bool
{
    return isset($var);
}

// or even shorter version by using arrow functions
$isset = fn($var) => isset($var);

var_dump($isset($count)); // false, because the $count variable has not been declared


// If you assign null to a variable and pass it to the isset(), the isset() will return false:
$count = null;
var_dump(isset($count)); // false

// If you unset a variable, the variable becomes unset. Therefore, the isset() will return false
$count = 0;
unset($count);
var_dump(isset($count)); // false


// If you pass an array element to isset(), it’ll return true
$colors = ['primary' => 'blue'];
var_dump(isset($colors['primary'])); // true

// However, if you pass a non-existing element to isset(), it’ll return false. 
$colors = ['primary' => 'blue'];
var_dump(isset($colors['secondary'])); // false


// If you pass an array element with value null to isset(), The isset() will return false
$colors = ['primary' => 'blue','secondary' => null];
var_dump(isset($colors['secondary'])); // false


// isset() works with sring offsets
$message = 'Hello';
var_dump(isset($message[0])); // true

// but with an invalid offset it will return false
$message = 'Hello';
var_dump(isset($message[strlen($message)])); // false

// The isset() accepts multiple variables and returns true if all variables are set. 
// It evaluates the variables from left to right and stops when encountering an unset variable

$x = 10;
$y = 20;
$z = 30;

var_dump(isset($x, $y, $z)); // true, because all values are set

// but the following returns false, because the second one is null, also the third one will not evaluate
$x = 10;
$y = null;
$z = 30;

var_dump(isset($x, $y, $z)); // false


