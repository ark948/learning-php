<?php

// string is a sequence of characters

// php provides four ways to define a literal string
// single quoted, double quoted, heredoc syntax, newdoc syntax

$title = 'PHP string is awesome';
$title02 = "PHP string is awesome";

// with single quoted string, you can use . to concatenate two strings:
$name = 'John';
echo 'Hello ' . $name; // Hello John

// with double quoted string, you can place the variable inside the string:
$name = 'John';
echo "Hello $name";
// this feature is called variable interpolation
// also can be done as follows:
$name = 'John';
echo "Hello {$name}";

// NOTE: variable interpolation DOES NOT work with single quotes

// beside this, double quoted strings, also supports special characters: \n, \r, \t by escaping them

// GOOD practice is to use single quote strings when you don't need variables inside them
// so php does not have to evaluate them

// we can use indexes to access string chars
$title = 'PHP string is awesome';
echo $title[0];

// to get the length of a string use strlen() function
echo strlen($title);