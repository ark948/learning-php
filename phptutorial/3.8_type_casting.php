<?php

// type casting basically means to convert a value of one type to another of type

// cast to integer
// to cast a value to integer use (int) cast operator:
echo (int)12.5 . '<br>'; // 12
echo (int)12.1 . '<br>'; // 12
echo (int)12.9 . '<br>'; // 12
echo (int)-12.9 . '<br>'; // -12

// now, in case of casting a string to integer
$message = 'Hi';
$num = (int) $message;
echo $num; // 0

// if string is numeric, like '100', it will be converted to int
// otherwise it will be converted to 0
$amount =  (int)'100 USD';
echo $amount; // 100

// also (int) cast operator will cast the string null to 0
$qty = null;
echo (int)$qty; // 0

// to cast to float, use the (float) operator
$amount = (float)100;
echo $amount; // 100

// to cast to string use (string)
$amount = 100;
echo (string)$amount . " USD"; // 100 USD

// sometimes (string) is not needed, because of a feature called type juggling that implicitly converts the integer to a string:
$amount = 100;
echo $amount . ' USD'; // 100 USD

// The (string) operator converts the true value to the string "1" and false value to the empty string (“”).
$is_user_logged_in = true;
echo (string)$is_user_logged_in; // 1

// The (string) operator casts null to an empty string.
// The (string) cast an array to the "Array" string. For example:
$numbers = [1,2,3];
$str = (string) $numbers;
echo $str; // Array
// And you’ll get a warning that you’re attempting to convert an array to a string.
