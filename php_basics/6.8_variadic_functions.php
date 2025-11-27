<?php


// a variadic function accepts a variable number of parameters

// example:
// this is a simple function that accepts two parameters
function sum(int $x, int $y)
{
    return $x + $y;
}

echo sum(10, 20); // 30


// to allow sum() to accept a variable number of arguments, need to use func_get_args()
// func_num_args returns an array containing all arguments
function sum2()
{
    $numbers = func_get_args();
    $total = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $total += $numbers[$i];
    }
}

echo sum2(10, 20); // 30
echo sum2(10, 20, 30); // 60

// PHP 5.6 introduced the ... operator. When you place the ... operator in front of a function parameter, 
// the function will accept a variable number of arguments, and the parameter will become an array inside the function.
function sum3(...$numbers)
{
    $total = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $total += $numbers[$i];
    }

    return $total;
}
echo sum3(10, 20) . '<br>'; // 30
echo sum3(10, 20, 30) . '<br>'; // 60


// PHP 7 allows you to declare types for variadic arguments. For example:
// in this example, sum() will accept only integers
function sum4(int ...$numbers): int
{
    $total = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $total += $numbers[$i];
    }

    return $total;
}

// If a function has multiple parameters, only the last parameter can be variadic
function my_func($a, $b, ...$params) {
    echo 'doing stuff...';
}

// to calculate the sum of all elements of an array use array_sum()
function sum5(int ...$numbers): int
{
    return array_sum($numbers);
}

