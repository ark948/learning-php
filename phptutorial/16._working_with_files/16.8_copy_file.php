<?php


// to copy a file from one location to another use the copy() function
// copy ( string $source , string $dest , resource $context = ? ) : bool

// returns true if it is copied successfully, false otherwise

// simple copy example
// this exmaple copies readme.txt to readme.bak (unclear why the file type is changed)
$source = 'readme.txt';
$dest = 'readme.bak';

echo copy($source, $dest)
    ? "The file $source was copied to $dest successfully."
    : "Error copying the file";



    // sometimes we need to check if the destination file exists
$source = 'readme.txt';
$dest = 'readme.bak';
!file_exists($source) && die("The $source does not exist");

file_exists($dest) && die("The file $dest already exists.");

echo copy($source, $dest)
    ? "Copy successful."
    : "Error in copying file";


// a helper function to copy a file, will return false if source does not exist, or destination already exists and overwritten is false
function copy_file($source, $dest, $overwritten = true): bool
{
    if (!file_exists($source)) {
        return false;
    }

    if (!$overwritten && file_exists($dest)) {
        return false;
    }

    return copy($source, $dest);
}