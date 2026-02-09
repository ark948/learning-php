<?php


// php allows for working with directories
// you can open, read, create, and delete them

// opendir(), readdir(), closedir()
// these functions work together to manually open and loop through their content
// . is the current directory and .. is the parent directory

// we'll be reading the uploads folder
$dir = "uploads"; // dir name
if (is_dir($dir)) {
    $handle = opendir($dir);
    if ($handle) {
        echo "Files in '$dir': " . PHP_EOL;
        while (($file = readdir($handle)) !== false) {
            // readdir() -> reads one item, each time it's called
            // we loop through dir, and print the name of files and folders
            echo $file . PHP_EOL;
        }
        closedir($handle);
    }
}


// scandir() -> reads the entire directory and returns an array of all items
echo "--------------------------------" . PHP_EOL;
$files = scandir("uploads");
foreach ($files as $file) {
    echo "$file " . PHP_EOL;
}


// mkdir() -> creates a directory
// mkdir("made_from_php"); 

// by default creates the dir in the current directory, can be changed + nested folders
// permissions can be specified
// 0777 -> sets read/write/executable perms (this is a permission mode)
// last arg is a boolean, allows for creating any missing parent directory

// you should always check before creating a dir
if (!is_dir("uploads")) {
    // make dir now
    // mkdir("uploads/images", 0777, true);
}


// rmdir() -> removes a dir
// the folder must be empty
// rmdir("uploads");

// if wish to delete dir with files, first you need to loop through them, remove each using unlink()
// and then remove the dir