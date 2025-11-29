<?php

header("Content-Type: application/octet-stream");

// octet-stream -> mime type of unknown binary file

$file = $_GET['file'] . ".pdf"; // i think this is just the file name

header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));

flush();


$fp = fopen($file, "r");
while (!feof($fp)) {
    echo fread($fp, 65536);
    flush(); // This is essential for large downloads
} 

fclose($fp); 