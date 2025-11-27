<?php

// scope of a variable determines which part of code can access it


// there are four types of scopes:
// Local, Global, Static, Function parameters

// local
// variables defined isnide a function are only accessible inside that function
function say()
{
	$message = 'Hi';
	echo $message;
}

// echo $message; // this will cause an error

// When you declare a variable outside of a function, the variable is global.
$message = 'Hello'; // this is global
function say2()
{
	$message = 'Hi';
	echo $message; // Hi
}

echo $message; // Hello

// to access a global variable from inside a function, we need to use the global variable
$message = 'Hello';

function say3()
{
	global $message;
	echo $message; // Hello
}

// IMPORTANT, It’s important to note that using global variables is not a good practice. IMPORTANT

// php has a list of builtin variables
// these are called superglobals
// they provide information about the php script's environment

// Superglobal Variables	Meaning
// $GLOBALS	Returns an array that contains global variables. The variable names select which part of the array to access.
// $_SERVER	Returns data about the web server environment.
// $_GET	Return data from GET requests.
// $_POST	Return data from POST requests.
// $_COOKIE	Return data from HTTP cookies
// $_FILES	Return data from POST file uploads.
// $_ENV	Return information about the script’s environment.
// $_REQUEST	Return data from the HTTP request
// $_SESSION	Return variables registered in a session

// A static variable retains its value between function calls. Also, a static variable is only accessible inside the function. 
function get_counter() {
    static $counter = 1;
    return $counter++;
}
echo get_counter() .  '<br>'; // 1
echo get_counter() .  '<br>'; // 2
echo get_counter() .  '<br>'; // 3

// Function parameters are local to the function. Therefore, function parameters can only be accessible inside the function.
