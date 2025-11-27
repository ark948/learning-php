<?php

// the ternary operator is a shorthand for if...else statement

// instead of this:

$condition = 1;
$value1 = 10;
$value2 = 20;
if ($condition) {
	$result = $value1;
} else {
	$result = $value2;
}

// we can write this using ternary opreator:
$result = $condition ? $value1 : $value2;

// example
$is_user_logged_in = false;

if ($is_user_logged_in) {
	$title = 'Logout';
} else {
	$title = 'Login';
}

echo $title;

// re-written as ternary operator
$title = $is_user_logged_in ? 'Logout' : 'Login';
echo $title;

// since php 5.3, there is a shorthand for ternary operator
$result = $initial ?: $default;

// if initial is true, php will asisgn the value of initial to result. otherwise it will assign the default to result

// example:
$path = '/about';
$url = $path ?: '/';

echo $url; // /about


// ternary operators can be chained using parentheses
// but it is not recommended
$eligible = true;
$has_credit = false;

$message = $eligible ? ($has_credit ? 'Can use the credit' : 'Not enough credit') : 'Not eligible to buy';

echo $message; // not enough credit
