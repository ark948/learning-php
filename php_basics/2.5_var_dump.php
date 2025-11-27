<?php

// var_dump() is a function that allows for dumping of information about a variable

// it takes a variable and displays the type and value of it

$balance = 100;

var_dump($balance); // int(100)

// we can use <pre> tag to make var_dump() more intuitive
echo '<pre>';
var_dump($balance);
echo '</pre>';

// the dump helper function
function d($data)
{
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}

$balance = 100;
d($balance );


// the die() function displays a message and then terminates the execution of the script
// Sometimes, you want to dump the information of a variable and terminate the script immediately. 
// In this case, you can combine the var_dump() function with the die() function as follows:
$message = 'Dump and die example';

echo '<pre>';
var_dump($message);
echo '</pre>';
die();

echo 'After calling the die function'; // this line will not be executed

// dump and die helper function
function dd($data)
{
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
	die();
}

$message = 'Dump and die example';

dd($message);
