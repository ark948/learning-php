<?php

// the null type is a special value that indicates absence of a value for a variable

$email = null;
var_dump($email); // NULL

// In addition, when you use the unset() function to unset a variable, the variable is also null. For example:
$email = 'webmaster@phptutorial.net';
unset($email);
var_dump($email); // NULL

// php keywords are case-insensitive
// null, Null, NULL are all ok
$email = null;
$first_name = Null;
$last_name = NULL;

// to check if a variable is null, use the is_null() function:
$email = null;
var_dump(is_null($email)); // bool(true)

$home = 'phptutorial.net';
var_dump(is_null($home)); // bool(false)

// To test if a variable is null or not, you can also use the identical operator ===.
$email = null;
$result = ($email === null);
var_dump($result); // bool(true)

$home= 'phptutorial.net';
$result = ($home === null);
var_dump($result); // bool(false)

