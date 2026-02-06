<?php

// fopen() reads a specific number of bytes from a file
$handle = fopen("files/data.txt", "r");
var_dump($handle); // resource(5) of type (stream)


$content = fread($handle, filesize("files/data.txt")); // we use filesize() to read the whole file
fclose($handle);
echo $content;


// fgets() -> reads one line a time from the file
$handle = fopen("files/data.txt", "r");
while (($line = fgets($handle)) !== false) {
    // keep reading and printing the lines until line equals false (we have reached the end of line)
    echo $line . PHP_EOL;
}
fclose($handle);

