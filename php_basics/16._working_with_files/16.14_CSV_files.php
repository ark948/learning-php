<?php


// how to work with CSV files in php?

// CSV stands for comma-separated values
// it is a text file that stores tabular data in form of comma separated values
// it stores each record per line and it may have a header

// it a content of a cell also contains a comma, CSV will surround that cell with douible

// it can also use other characters as separator such as semicolon

// use fputcsv() to write a line to csv file

// example of writing data to a csv file
$data = [
	['Symbol', 'Company', 'Price'],
	['GOOG', 'Google Inc.', '800'],
	['AAPL', 'Apple Inc.', '500'],
	['AMZN', 'Amazon.com Inc.', '250'],
	['YHOO', 'Yahoo! Inc.', '250'],
	['FB', 'Facebook, Inc.', '30'],
];

$filename = 'stock.csv';

// open csv file for writing
$f = fopen($filename, 'w');

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// write each row at a time to a file
foreach ($data as $row) {
	fputcsv($f, $row);
}

// close the file
fclose($f);


// IMPORTANT
// if you are dealing with unicode characters, the file header needs to be changed using fputs() after opening the file
$f = fopen($filename, 'w');

if ($f === false) {
	die('Error opening the file ' . $filename);
}

fputs($f, (chr(0xEF) . chr(0xBB) . chr(0xBF))); // support unicode

// writing to a CSV file
//....


// to read from a CSV file, use the fgetcsv() function
// it reads a line of csv from the pointer's position
// each line of csv file is an array

// it returns false in case of an error, or if the pointer reaches the end-of-file

// example of reading the stock.csv file
$filename = './stock.csv';
$data = [];

// open the file
$f = fopen($filename, 'r');

if ($f === false) {
	die('Cannot open the file ' . $filename);
}

// read each line in CSV file at a time
while (($row = fgetcsv($f)) !== false) {
	$data[] = $row;
}

// close the file
fclose($f);

