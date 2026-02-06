<?php


// relative path
$content = file_get_contents("files/data.txt");
echo $content;


// absolute path
$content2 = file_get_contents(__DIR__ . "/files/data.txt");
echo $content2;