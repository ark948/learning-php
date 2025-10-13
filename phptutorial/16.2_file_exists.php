<?php


// there are some functions to check if a file exists
// file_exists(), is_file(), is_readable(), and is_writable()

// to check if file exists
// file_exists ( string $filename ) : bool

// returns true if yes and false otherwise

// example

$filename = 'readme.txt';
if (file_exists($filename)) {
    $message = "File $filename exists";
} else {
    $message = "File $filename does not exist.";
}

echo $message;

// $filename can aslo be a directory
// file_exists() can check for that as well


// If you want to check if a path is a file and not a directory and exists in the file system, use is_file() function
// example
$filename = 'readme.txt';

if (is_file($filename)) {
    $message = "The file $filename exists. IS_FILE";
} else {
    $message = "The file $filename does not exist. IS_FILE";
}
echo $message;



// to check if a file exists and is readable
// use is_readable(), $filename can be a dir


$filename = 'readme.txt';

if (is_readable($filename)) {
    $message = "The file $filename exists and is READABLE.";
} else {
    $message = "The file $filename does not exist OR NOT READABLE.";
}
echo $message;



// to check if a file exists and is writable
// is_writable()

$filename = 'readme.txt';

if (is_writable($filename)) {
    $message = "The file $filename exists AND IS WRITABLE.";
} else {
    $message = "The file $filename does not exist OR NOT WRITABLE.";
}

echo $message;