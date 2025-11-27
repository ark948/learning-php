<?php

// a Constant is a variable which value cannot and should not be changed

// to define a constant use the define() function

define('WIDTH', '1140px');
echo WIDTH;

// by convention constant names are uppercase
// unlike variables, they do not start with a dollar sign

// constant names are case-sensitive
// it is possible to define case-insensitive constants, but they are deprecated since php 7.3

// since php 7, a constant is able to keep an araray as well
define('ORIGIN', [0, 0]);

// another way to define a constant is to use the const keyword
const SALES_TAX = 0.085;
const RGB = ['red', 'green', 'blue'];

// differences of define and const

// define is a function, const is a language construct
// define() function defines a constnt at run-time, whereas const keyword defines a constant at compile time

// which means define can be used conditionally as follows:
if (SALES_TAX == 0.085) {
    define('SOMETHING', 1);
}

// const cannot be used like that

// also define allows for using expressions to declare the cosntant name:
define('PREFIX', 'OPTION');
define(PREFIX . '_1', 1);
define(PREFIX . '_2', 2);
define(PREFIX . '_3', 3);

