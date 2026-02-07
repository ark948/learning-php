<?php


/**
 * fopen() gives a pointer (cursor) that tracks where in the file we are.
 * every time we read or write, the pointer moves forward.
 * this pointer can also be manually moved.
 * 
 * ftell() -> gives the current position of the pointer in bytes
 */


$handle = fopen("files/data.txt", "r");
echo ftell($handle);
// at first, it is at 0

echo PHP_EOL;

fgets($handle); // read one line
echo ftell($handle); // now pointer has moved forward
fclose($handle);


/**
 * fseek($handle, $offset, $whence) -> move the pointer to a new position
 * 
 * $offset: how many bytes to move
 * $whence: where to start from
 * SEEK_SET -> from the beginning (default)
 * SEEK_CUR -> from current position
 * SEEK_END -> from the end of file
 */

echo PHP_EOL;

$handle = fopen("files/data.txt", "r");
fseek($handle, 10, whence: SEEK_SET); // move to 10th byte in the file
echo fgets($handle); // read from there
fclose($handle);
// if offset is negative, it reads from right to left

echo PHP_EOL;

/**
 * rewind($handle) -> moves the pointer back to the beginning
 */

$handle = fopen("files/small.txt", "r");
echo fgets($handle); // read a line
rewind($handle); // go back to start
echo fgets($handle); // read the same line again
fclose($handle);