<?php

// php is loosely type language.
// when defining a variable, the type does not need to be declared.
// php will do that internally

$my_var = 'PHP'; // a string

// If you assign an integer to the same variable, and its type will be the integer:
$my_var = 'PHP'; // a string
$my_var = 100; // an integer

// PHP has a feature called type juggling.
// It means that when comparing variables of different types, PHP will convert them to the common, comparable type.
// example:
$qty = 20;
if($qty == '20') {
    echo 'Equal';
}

// type juggling also works on arithmetic operations
$total = 100;
$qty = "20";
$total = $total + $qty;

echo $total; // 120
// type of total is integer


$total = 100;
$qty = "20 pieces";
$total = $total + $qty;

echo $total; // 120
// but in this example, a warning is raised
// A non-numeric value encountered

