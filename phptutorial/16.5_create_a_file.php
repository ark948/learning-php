<?php


// fopen() can open a file, it can also create a file if it does not exist

// to create a file using this function, specify filename and one of the following modes
// Mode	File Pointer
// ‘w+’	At the beginning of the file
// ‘a’	At the end of the file
// ‘a+’	At the end of the file
// ‘x’	At the beginning of the file
// ‘x+’	At the beginning of the file
// ‘c’	At the beginning of the file
// ‘c+’	At the beginning of the file

// IMPORTANT
// to create a binary file, append 'b' to mode, example 'wb+'

// example of creating a binary file and writing some numbers to it
$numbers = [1, 2, 3, 4, 5];
$filename = 'numbers.dat';
$f = fopen($filename, 'wb');
if (!$f) {
    die('Error creating the file ' . $filename);
}
foreach ($numbers as $number) {
    fputs($f, $number);
}
fclose($f);


// Creating a file using the file_put_contents() function
// this function writes data to a file
// if file does not exist it will be created

// it is similar to having fopen(), fputs(), and the fclose()

// example of downloading a webpage and writing it to a file
$url = 'https://www.example.net';
$html = file_get_contents($url);
file_put_contents('home.html', $html);