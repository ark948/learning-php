<?php


// we can use the finally block with try-catch to clean-up resources

// in the following example, we try to open a csv file
// in case of an exception, we handle it and then attempt to clsoe the file properly

$data = [];

try {
	$f = fopen('data.csv', 'r');
	while ($row = $fgetcsv($f)) {
		$data[] = $row;
	}
} catch (Exception $ex) {
	echo $ex->getMessage();
} finally {
	if ($f) {
		fclose($f);
	}
}

// finally is optional
// it will always execute

// here is the divide helper function that will return null in case of an error
function divide($x, $y)
{
	try {
		$result = $x / $y;

		return $result;
	} catch (Exception $e) {
		return null;
	} finally {
		return null;
	}
}

// IMPORTANT
// typically, the return statement will stops the current execution and return a value
// however in case of finally block, finally block still executes after return statement

// catch is also optional
// so there could be only try...finally