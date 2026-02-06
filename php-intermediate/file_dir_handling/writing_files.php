<?php


// Writing and Appending

/**
 * file_put_contents() -> opens the file, writes content, and closes it.
 * overwrites it by default, to append instead: specify flag, FILE_APPEND
 * 
 * Note: file_put_contents() will create it if file does not exist
 */


// we'll be writing into files/message.txt
file_put_contents("files/message.txt", "Welcome to PHP!\n");

// to append content
file_put_contents("files/message.txt", "Told ya, it's gonna be fun. (This will be appended)\n", FILE_APPEND);

// Need to research this: (the use of PHP_EOL vs \n)
// file_put_contents("files/message.txt", PHP_EOL."Told ya, it's gonna be fun. (This will be appended)", FILE_APPEND);


// we'll be writing into files/log.txt
// fwrite() gives us more control
$handle = fopen("files/log.txt", "w");
fwrite($handle, "This will erase old content.\n");
fclose($handle);

// to append
$handle = fopen("files/log.txt", "a");
fwrite($handle, "This will be added to the end.\n");
fclose($handle);

// to create new file use "x" mode
// NOTE: "x" mode will fail if file already exists
// advice: check if files exists before writing into it