<?php

// a boolean represents a truth value

// boolean values are case-insensitive

// true and TRUE are the same, same for false  and FALSE

// some values can be evaluated to true and false

// false
// 0, 0.0, '', "0", NULL, []

// others evaluate to true

// to check if a value is boolean
$is_email_valid = false;
echo is_bool($is_email_valid);
// this function shows 1 for true, and nothing for false

var_dump($is_email_valid); // this is better

