<?php

// Comparison operators will allow us to compare two variables

// == equal to
// != , <> not equal to
// === identical to (returns true if both operands have the same type and value)
// !== not identical to
// > greater than
// >= greater than or equal
// < less than
// <= less than or equal to


$x = 10;
$y = 10;
var_dump($x == $y); // bool(true)


$x = 20;
$y = 10;
var_dump($x == $y); // bool(false)

$x = '20';
$y = 20;
var_dump($x == $y); // bool(true)


$x = 20;
$y = 10;
var_dump($x != $y); // bool(true)


$x = '20';
$y = 20;
var_dump($x === $y); // bool(false)


$x = 10;
$y = 20;
var_dump($x > $y); // bool(false)
var_dump($y > $x); // bool(true)

$x = 20;
$y = 20;
var_dump($x <= $y); // bool(true)
var_dump($y <= $x); // bool(true)

$x = 20;
$y = 10;
var_dump($x < $y); // bool(false)
var_dump($y < $x); // bool(true)


$x = 20;
$y = 20;
var_dump($x >= $y); // bool(true)
var_dump($y >= $x); // bool(true)