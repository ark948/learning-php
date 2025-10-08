<?php


// exceptions are unexpected errors

// they halt the script, to prevent that, we should handle them gracefully

// example of trying to read a CSV file

$data = [];
$f = fopen('data.csv', 'r');

try {
	$f = fopen('data.csv', 'r');

	do {
		$row = fgetcsv($f);
		$data[] = $row;
	} while ($row);

	fclose($f);
} catch (Exception $ex) {
	echo $ex->getMessage();
}

fclose($f);

// if data.csv file does not exist, there will be some warnings
// so we'll add the try catch clause

// The exception variable $ex is an instance of the Exception class that contains the detailed information of the error.
// A try...catch statement can have multiple catch blocks. Each catch block will handle a specific exception
/*
try {
	//code...
} catch (Exception1 $ex1) {
	// handle exception 1
} catch (Exception2 $ex2) {
	// handle exception 2
} catch (Exception1 $ex3) {
	// handle exception 3
}
*/

// IMPORTANT
// When a try...catch statement has multiple catch blocks, the order of exception should be from the specific to generic. 
// the most generic exception must come at last
// If you have the same code that handles multiple types of exceptions...
// you can place multiple exceptions in one catch block and separate them by the pipe (|) character like this, since php 7.1
/*
try {
	//code...
} catch (Exception1 | Exception2 $ex12) {
	// handle exception 1 & 2
} catch (Exception3 $ex3) {
	// handle exception 3
}
*/

// As of PHP 8.0, the variable name for the caught exception is optional
/*
try {
	//code...
} catch (Exception) {
	// handle exception
}
*/
// but we will not have access to Exception object