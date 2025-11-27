<?php


// how to deal with file permissions in php?
// file permissions specify what a user can do with a file, read, write or executing it.
// php automatically grants appropriate permissions behind the scene

// e.g. if you open a file for writing, php automatically grants the read and write permissions

// php has some functions for checking and changing permissions

// to check for permissions php has 3 functions

// is_readable() -> true if file exists and is readable false otherwise

// is_writable() -> returns true if file exists and writable, false otherwise

// is_executable() -> returns true if file is executable, false otherwise

$filename = 'readme.txt';
$functions = [
	'is_readable',
	'is_writable',
	'is_executable'
];

foreach ($functions as $f) {
	echo $f($filename) ? ' The file ' . $filename . $f : '';
}



// php also has fileperms() that will return an integer, which represents the permissions set on a particular file
// (I HAVE NO IDEA WHAT THIS NUMBER IS SUPPOSED TO BE)
// apparently this function is very close to operating system
// your result may vary (the number could be different)
$permissions = fileperms('readme.txt');
echo substr(sprintf('%o', $permissions), -4); //0666
echo $permissions;


// what this function will return, is the file mode in octal format (as with the case with the stat() system call in Unix)
// there is a helper function for avaialble in php offical doc, but that is also complicated



// to change the file permission or mode, use the chmod() function
// chmod ( string $filename , int $permissions ) : bool


/*
The following table illustrates the value of each digit that represents the access permission for particular users ( owner, user group, or everyone else) :

    Value	Permission
    0	cannot read, write or execute
    1	can only execute
    2	can only write
    3	can write and execute
    4	can only read
    5	can read and execute
    6	can read and write
    7	can read, write and execute
*/

// The following example sets permission that the only owner can read and write a file, everyone else only can read the file:
$filename = './readme.txt';
chmod($filename, 0644);

