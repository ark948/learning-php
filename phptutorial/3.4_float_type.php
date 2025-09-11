<?php

// Floating-point numbers represent numeric values with decimal digits.

// Floating-point numbers are often called floats, doubles, or real numbers. 

// 1.25
// 3.14
// -0.1

// PHP also supports the floating-point numbers in scientific notation:
// 0.125E1 // 0.125 * 10^1 or 1.25

// Since PHP 7.4, you can use the underscores in floats to make long numbers more readable. For example:
// 1_234_457.89

// Since the computer cannot represent exact floating-point numbers, it can only use approximate representations.

// For example, the result of 0.1 + 0.1 + 0.1 is 0.299999999…, not 0.3. When comparing two floating-point numbers using the == operator, you must be careful.

// The following example returns false, which may not be what you expected:
$total = 0.1 + 0.1 + 0.1;
echo $total == 0.3; // return false


// To check if a value is a floating-point number, you use the is_float() or is_real() function. 
// The is_float() returns true if its argument is a floating-point number; otherwise, it returns false. For example:

echo is_float(0.5);