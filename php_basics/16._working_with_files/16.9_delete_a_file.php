<?php


// to delete a file in php, use unlink() function
// unlink ( string $filename , resource $context = ? ) : bool

// if file does not exist, returns false

// simple example
$filename = 'readme.txt';
if (unlink($filename)) {
    echo 'The file' . $filename . 'was deleted successfully.';
} else {
    echo 'There was an error' . $filename;
}


// delete all files in dir that match a pattern

// example: delete all files with .tmp extension
$dir = 'temp/';
array_map('unlink', glob("{$dir}*.tmp"));

// the glop() function searches for files with given pattern
