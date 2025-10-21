<?php


// filesize() function will return the size of a given file in bytes

$filename = 'readme.txt';
echo $filename, ': ', filesize($filename), 'bytes';
// readme.txt: 19 bytes

// in practice, you probably need to convert the filesize from byte to something more human readable
function format_filesize(int $bytes, int $decimals = 2): string
{
    $units = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $units[(int)$factor];
}

// I have no idea what this function does