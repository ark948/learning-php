<?php


// these examples are intended for linux
// since most servers run on linux

// chmod()

// permissions are represented using a three-digit number like 0644 or 0755 (these are octal numbers)
// each digit represents the permission for:
    // 0 -> ignore
    // the owner
    // the group
    // everyone else (others)

// each permission type has a numeric value
    // read -> 4
    // write -> 2
    // execute -> 1

// you add them together to get the permission number, example:
    // 6 -> read + write (4 + 2)
    // 7 -> read + write + execute (4 + 2 + 1)

// so if you run chmod("file.txt", 0644), it means:
    // the owner can -> read and write
    // the group can -> read
    // others can -> read

// and chmod('myfolder', 0755), it means:
    // the owner can -> read, write, execute
    // group -> read and execute (NOT write)
    // others -> read and execute (NOT write)


// 0644 -> is usually standard for files
// 0755 -> standard for folders
// 0600 -> only owner can access
// 0777 -> dangerous (everyone can modify)


// to aquire permissions of a file
echo fileperms("files");
// this gives us a decimal number like 16895
// we need to conver this to octal: 40777
// 40777, 4 refers to dir itself?, 0 means the remaining is an octal number, 777 -> everyone can modify

// you can create a folder and specify the permissions
// mkdir(directory: "some_test_folder", permissions: 0666);
// this may not work on windows

// there are other functions for managing permissions, groups, cache