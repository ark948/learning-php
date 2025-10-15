<?php


// tmpfile() and tempnam() can be used to create temp files in php

// temp files only exist during the execution of the scirpt
// when the script ends, php will delete the temp file

// tmpfile() : resource|false

// it creates a temp file in read/write mode (w+) and return the filehandle
// if it fails returns false

// it returns a temp file with a unique name
// it ends when fclose() is called or no reference remains, or when script ends

// example
$f = tmpfile();
if (false !== $f) {
    // write some text to the file
    fputs($f, 'The current time is ' . date("%c"));
}
echo 'The current time is ' . date('%c');
// exit(1);


// tempnam() creates a temp file in a dir and returns the full path to that file
// accepts dir as a param, if not exist or not writable, uses the TMPDIR system variable on unix or TMP on windows
// accepts $prefix as prefix of the temp file name

// example
$name = tempnam('tmp', 'php');

// full path to the temp file
echo $name; //C:\xampp\htdocs\tmp\phpA125.tmp

// open the temporary file
$f = fopen($name, 'w+');
if ($f) {
    // write a text to the file
    fputs($f, 'the current time is ' . date('%c'));
    fclose($f);
}


// NOTE
// strftime() is deprecated

// temp dir in windows is usually in user/AppData/Local/Temp