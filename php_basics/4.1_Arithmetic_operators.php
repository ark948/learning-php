<?php


// arithmetic operators includes addition, subtraction, multiplication, division, exponentiation, and modulo

// if you attempt to supply a non-numeric value to arithmetic operators, php will try to convert them before the operation
// will may result in unexpected behavior

// Addition
$x = 10;
$y = 20;
$z = $x + $y;
var_dump($z);

// if a float is involved, the result will also be float
$x = 10;
$y = 2.0;
$z = $x + $y;
var_dump($z);

// IMPORTANT: Computers cannot represent floats precisely. In some cases, the result will not be what you expect. 
$z = 0.1 + 0.1 + 0.1;
var_dump($z); // float(0.30000000000000004)


// You’ll encounter an issue If you add floats and compare the result with another float. For example, the following returns false instead of true
$z = 0.1 + 0.1 + 0.1;
var_dump($z === 0.3); // bool(false)

// in the following case, php will attempt to convert the string to integer
$x = 1 + '2';
echo $x; // 3

// if php encounter a non-numeric value, a warning will be raised
// if php cannot convert the value at all, a fatal error will be raised
$x = 1 + 'a';
echo $x;

// subtraction
$x = 20;
$y = 10;
$z = $x - $y;
var_dump($z); // 10


// multiplication
$x = 10;
$y = 20;
$z = $x * $y;
var_dump($z); // 200

// division
$x = 20;
$y = 10;
$z = $x / $y;
var_dump($z); // 2

// if you attempt to divide a number by zero, a fatal error will be raised
$x = 10 / 0; // Fatal error

// The modulus operator (%) returns the remainder of the division:
$x = 5;
$y = 2;
$z = $x / $y;
var_dump($z); // float(2.5)


// The exponentiation operator (**) raises a number to the power of another number.
$result  = 10 ** 3;
var_dump($result); // int(1000)

