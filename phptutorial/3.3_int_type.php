<?php

// integers are whole numbers

// to get the size of the integer use this constant: PHP_INT_SIZE

// to get the min int size: PHP_INT_MIN
// to get the max int size: PHP_INT_MAX

// PHP represents integer literals in decimal, octal, binary, and hexadecimal formats.

// from php 7.4 we can use underscore to group digits in integer to make it easier to read
// 1000000
// is equal to
// 1_000_000

$a = 1_000_000;

// Octal numbers consist of a leading zero and a sequence of digits from 0 to 7
// they can have a plus or minus sign
// +010 -> decimal 8

// hexadecimal consist of a leading 0x and sequence of 0-9 or letters A-F
// they can include minus or positive

// 0x10 // decimal 16
// 0xFF // decimal 255


// binary numbers start with 0b followed by sequence of 0 and 1
// 0b10

// is_int() functions returns 1 if a value is an integer, false otherwise
$amount = 100;
echo is_int($amount);

