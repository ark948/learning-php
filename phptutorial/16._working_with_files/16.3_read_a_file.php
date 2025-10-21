<?php


// to read contents of a file, we open it using fopen(), read the content using, fread(), and then close it using fclose()
// fread ( resource $stream , int $length ) : string|false

// $stream is a system pointer resource
// $length specifies the maximum number of bytes to read
// to read the entire file, pass the file size to $length parameter

// fread() returns the file content or false otherwise

// fread() will stop reading the file, once the length has been reached, or the end of file has been reached (EOF)

// to check if a pointer is at end of file, pass it to feof() function
// feof ( resource $stream ) : bool
// it will return true if EOF is reached or an error has ocurred, otherwise false

// to read a file line by line, use the fgets() function
// fgets ( resource $handle , int $length = ? ) : string|false
// if length is omitted, the entire line will be read

// the following example, will read the entire txt file into a string and shows it
$filename = 'readme.txt';
$f = fopen($filename, 'r');
if ($f) {
    $contents = fread($f, filesize($filename));
    fclose($f);
    echo nl2br($contents);
    // nl2br() function to convert the newline characters to <br> tags
}

// IMPORTANT
// file_get_contents() function is a shortcut for opening a file, reading the whole file’s contents into a string, and close it.


// read some characters from a file example
// in this example, we specify to only read the first 100 bytes of a text file
$filename = 'readme.txt';
$f = fopen($filename, 'r');
if ($f) {
    $contents = fread($f, 100);
    fclose($f);
    echo nl2br($contents);
}


// to read line by line example
$filename = 'readme.txt';
$lines = [];
$f = fopen($filename, 'r');
if (!$f) {
    // if file does not exist, terminate early
    return;
}
while (!feof($f)) {
    // until end of file has not been reached
    // append line by line
    $lines[] = fgets($f);
}
print_r($lines);
fclose($f);

