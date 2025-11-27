<?php


// type hints are used to declare the type of variables
// typically in function parameters and return values

// php is dynamically type language
// it is not REQUIRED to declare the type of parameters and variables

function add($x, $y)
{
    return $x + $y;
}

// in this example, if you provide two integers, function will work fine, result is an integer
// if you pass two floating point numbers, function will work, and the result is a float as well
// if you pass one integer, and one numeric string, php will convert the string and function works ok
$result = add(1,'2');
echo $result; // 3

// but if you pass two strings, it will return a fatal error
// this is when type hints comes in
// they will allow us to enforce a certain type to increase accuracy

// In PHP 5, you can use array, callable, and class for type hints. In PHP 7+, you can also use scalar types such as bool, float, int, and string.

// the following is an example of adding type hints to a function

function add2(int $x, int $y)
{
    return $x + $y;
}

// in this case, even if you pass floats, the result will still be an integer
$result = add2(1 ,2.5);
echo $result; // 3
// In this case, PHP implicitly coerces 2.5 into an integer (2) before calculating the sum. Therefore, the result is an integer.

// Note that PHP issued the following decprecation message:
// Deprecated: Implicit conversion from float 2.5 to int loses precision

// type hint for return value
function add3(int $x, int $y): int
{
    return $x + $y;
}

// Starting from PHP 7.0, if a function doesn’t return a value, you use the void type.
function dd($data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

// Starting from PHP 8.0, if a function returns a value of several types, you can declare it as a union type.
function add4($x, $y): int | float
{
    return $x * $y;
}

var_dump(add(10, 20));
var_dump(add(1.5, 2.5));
// In this example, the add() function returns an integer or a floating-point number, depending on the types of arguments.

// If a function returns a value of many types, you can use the mixed type.
// The mixed type means one of several types. The mixed type is equivalent to the following union type:

// object|resource|array|string|int|float|bool|null
// Code language: PHP (php)
// The mixed has been available since PHP 8.0.0.

// For example, the built-in function filter_var() uses both union type (array|int) and mixed type as the type hints:
// filter_var(mixed $value, int $filter = FILTER_DEFAULT, array|int $options = 0): mixed

// this function accepts a string and returns the uppercase of it
function upper(string $str): string
{
    return strtoupper($str);
}

// If you pass an argument of null, you’ll get an error
$str = null;
echo upper($str);

// To fix this, you can make the $str parameter nullable like this: (since php 7.1)
function upper2(?string $str): ?string
{
    if ($str != null) {
        return strtoupper($str);
    }
    return null;    
}

$str = null; // now null can be passed without raising an error
echo upper2($str);

// Note that the mixed type already includes the null type. Therefore, you don’t need to include nullable mixed
// if you do that, you'll encounter an error