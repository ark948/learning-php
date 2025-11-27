<?php


// to read an entire file into an array, use the file() function

// file ( string $filename , int $flags = 0 , resource $context = ? ) : array
// $flags is an optional parameter that can be one or more of the constants below

/*
Flag	Meaning
FILE_USE_INCLUDE_PATH	Search for the file in the include path.
FILE_IGNORE_NEW_LINES	Skip the newline at the end of the array element.
FILE_SKIP_EMPTY_LINES	Skip empty lines in the file.
*/

// The file() function returns an array in which each element corresponds to a line of the file. 
// if don't want the newline char in each element, use FILE_IGNORE_NEW_LINES

// this function, also works with remove files, using http or ftp protocol

// to read an entire file into an array, use file_get_contents()

// example the file() function will read the robot.txt file from php.net into an array and display its content line by line
$lines = file(
    'https://www.php.net/robots.txt',
    FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES
);

if ($lines) {
    foreach ($lines as $line) {
        echo htmlspecialchars($line) . PHP_EOL;
    }
}


// if you run this script behind a proxy, it will not work, to fix the issue
// you need to create a new stream context, and set the proxy
$options = [
    'http'=>[
      'method'=>"GET",
      'header'=>"Accept-language: en\r\n",
      'proxy'=>"tcp://<proxy_ip>:<proxy_port>"
    ]
];
$context = stream_context_create($options);
$lines = file(
    'https://www.php.net/robots.txt',
    FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES,
    $context
);
if ($lines) {
    foreach ($lines as $line) {
        echo htmlspecialchars($line) . PHP_EOL;
    }
}


// replace proxy_ip and proxy_port with your current proxy
