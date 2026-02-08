<?php


/**
 * PHP can manage files on the server, not just read or write them.
 * this includes deleting, renaming, and copying
 * 
 * unlink() -> deletes a file
 */


if (unlink("files/test.txt")) {
    echo "File deleted successfully";
} else {
    echo "Error: unable to delete file.";
}

// if file does not exist, php riggers a warning
// it is recommended to check if file exists first

if (file_exists("files/test.txt")) {
    unlink("files/test.txt");
    echo "file deleted successfully";
} else {
    echo "File was not found.";
}


/**
 * rename() -> rename or move a file
 * 
 * rename() can change the name of the file,
 * or move a file to a different folder (if you include a new path)
 */

//  example 1, rename:
if (rename("old.txt", "new.txt")) {
    echo "File renamed successfully";
} else {
    echo "Error renaming file.";
}

// example 2, move file:
rename("note.txt", "backup/notes.txt");


/**
 * copy() -> creates a duplicate of the file
 * 
 * if file does not exist, an error is thrown
 */

if (copy("data.txt", "data_backup.txt")) {
    echo "File copied successfully";
} else {
    echo "Copy failed";
}


// Error handling
// always check if file exists before performing any operation

$file = "example.txt";
if (!file_exists($file)) {
    echo "Error: File was not found";
} else {
    // example
    if (copy("file.txt", "backup_file.txt")) {
        echo "Copy operation ok";
    } else {
        echo "Copy failed.";
    }
}