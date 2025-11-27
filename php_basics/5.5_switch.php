<?php

// switch statement executes a code block by matching an expression with multiple values
// useful for when there is a variable that which will determine a number of different choices

$role = 'subscriber';
$message = '';

if ('admin' === $role) {
	$message = 'Welcome, admin!';
} elseif ('editor' === $role) {
	$message = 'Welcome! You have some pending articles to edit';
} elseif ('author' === $role) {
	$message = 'Welcome! Do you want to publish the draft article?';
} elseif ('subscriber' === $role) {
	$message = 'Welcome! Check out some new articles.';
} else {
	$message = 'Sorry! You are not authorized to access this page';
}

echo $message; // Welcome! checkout some new articles

// it can be written as follows using the much cleaner switch statement
$role = 'admin';
$message = '';

switch ($role) {
	case 'admin':
		$message = 'Welcome, admin!';
		break;
	case 'editor':
		$message = 'Welcome! You have some pending articles to edit';
		break;
	case 'author':
		$message = 'Welcome! Do you want to publish the draft article?';
		break;
	case 'subscriber':
		$message = 'Welcome! Check out some new articles.';
		break;
	default:
		$message = 'You are not authorized to access this page';
}

echo $message;

// cases can be combined
switch ($role) {
	case 'admin':
		$message = 'Welcome, admin!';
		break;
	case 'editor':
	case 'author':
		$message = 'Welcome! Do you want to create a new article?';
		break;
	case 'subscriber':
		$message = 'Welcome! Check out some new articles.';
		break;
	default:
		$message = 'You are not authorized to access this page';
}

// output: Welcome! Do you want to create a new article?
// if role is editor or author

// there is an alternative syntax for switch
// suitable for HTML
switch (expression):
	case value1:
		// code block 1
		break;
	case value2:
		// code block 2
		break;

	default:
		// default code block
		break;
endswitch;