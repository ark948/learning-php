<?php


// to read a file, it needs to be opned, to open a file
// use fopen() function

// fopen ( string $filename , string $mode , bool $use_include_path = false , resource $context = ? ) : resource

// $filename is the path to the file you want to open
// $mode specifies the type of access you require to the stream

// $use_include_path, whether to check for file in the included path
// i have no idea what this means.

// $context, specifies the stream context

// fopen() returns the file pointer resource if it is opened successfully or false otherwise

// what is pointer resource?

// there are many modes to open a file
/*
Mode	Reading	Writing	File Pointer	File doesn’t exist, Create?	If the File Exists
‘r’	Yes	No	At the beginning of the file	No	
‘r+’	Yes	Yes	At the beginning of the file	No	
‘w’	No	Yes	At the beginning of the file	No	
‘w+’	Yes	Yes	At the beginning of the file	Yes	
‘a’	No	Yes	At the end of the file	Yes	
‘a+’	Yes	Yes	At the end of the file	Yes	
‘x’	No	Yes	At the beginning of the file	Yes	Return false
‘x+’	Yes	Yes	At the beginning of the file	Yes	Return false
‘c’	No	Yes	At the beginning of the file	Yes	
‘c+’	Yes	Yes	At the beginning of the file
*/


// IMPORTANT
// if opening a binary file, you must append 'b' to the $mode argument:
// example: 'rb' open for reading

// after working with the file, it should be closed.
// to close a file: fclose ( resource $stream ) : bool
// returns true on success, false on failure

// IMPORTANT
// it's good practice to check if the file exitsts, before opening it

// example, opening a readme.txt file
// (i'll put it right here on the same level as this file)

$filename = 'readme.txt';
if (!file_exists($filename)) {
    die("The file $filename does not exists.");
}

$f = fopen($filename, 'r');
if ($f) {
    // process the file
    // ...
    echo "The file $filename is open.";
    fclose($f);
    echo "The file $filename is closed.";
}