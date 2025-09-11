<?php

// AND operator is a logical operator
// returns true if both operands are true

// since php keywords are case-insensitive, both AND and and are ok

// but, convention recommends lowercase

// and operator can also be rewritten as &&

// IMPORTANT:
// and has higher precedence than &&

// example:
// you want to offer discounts to customers who buy more than three items at a price more than 99:
$price = 100;
$qty = 5;
$discounted = $qty > 3 && $price > 99;

var_dump($discounted); // bool(true)

// if we change the quantity to 2, discount will be false
$price = 100;
$qty = 2;
$discounted = $qty > 3 && $price > 99;

var_dump($discounted); // bool(false)


// Short-circuiting 
// When the value of the first operand is false, the logical AND operator knows that the result must also be false
// in this case, it will not evaluate the second operand
// this process is called short-circuiting

$debug = false;
$debug && print('PHP and operator demo.'); // this message will not be printed

$debug = true;
$debug && print('PHP and operator demo!'); // but now it will

