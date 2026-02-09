<?php


// Checking File and Directory info

/**
 * when working with files, it's often important to check:
 * if file exists,
 * how large is it,
 * when it was last changed,
 * and whether you have permission to read or write it
 */

// to check if file or filder exists - file_exists()
if (file_exists("note.txt")) {
    echo "file exists";
} else {
    echo "file was not foud";
}


// getting file size - filesize()
if (file_exists("notes.txt")) {
    echo "File size: " . filesize("notes.txt") . " bytes. " . PHP_EOL;
}
// does not work with folders


// getting last modified time - filemtime()
$lastModified = filemtime("files/data.txt");
echo "Last modified: " . date(format: "Y-m-d H:i:s", timestamp: $lastModified);


// checking permissions - is_readable(), is_writable()

// check if file can be opened for reading
if (is_readable("notes.txt")) {
    echo "You can read this.";
} else {
    echo "no read perms";
}


// check if file or folder can be written in
if (is_writable("notes.txt")) {
    echo "You can write in this";
} else {
    echo "nope";
}

// especially useful before saving changes or uploads, so your program doesn't crash