<?php


// use file_get_contents() to read the entire file into a string
/*
file_get_contents ( 
    string $filename,  // name of the file
    bool $use_include_path = false , // if true, will look for file in included path
    resource $context = ? , // 
    int $offset = 0 , // offset where to start reading from, if negative, counts from end
    int $maxlen = ? // specifies maximum length of data to read
) : string|false
*/
// returns the contents or success

// example

// use file_get_contents() to download an entire webpage
$html = file_get_contents('https://example.com/'); // do not run this
echo $html;


// to read an entire file
$filename = 'readme.txt';
if (!is_readable($filename)) {
    die('File does not exist or not readable');
}

echo file_get_contents($filename);


// read part of a file
$filename = 'readme.txt';
if (!is_readable($filename)) {
    die('File does not exist or not readable');
}

echo file_get_contents($filename, false, null, offset: 10, length: 20);