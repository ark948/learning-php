<?php


// The include construct allows you to load the code from another file into a file. Here’s the syntax of the include construct

include 'test_include_with_this.php';

echo $hi; // hello
// run this with cmd> php 12.1_organizing_files_include.php

// if file cannot be found, php will throw a warning

// php first looks the path specified
// if not found, it searches the directory of the calling script and the current working directory
// if found, the code inside that file WILL BE executed IMPORTANT

// in general site design
// include is used for elements that are repeated throughout the entire site
// such as header and footer
// by convention, these files (such as header.php and footer.php) will be placed inside 'inc' folder

// header file usually contains the code for the header of the page
// and a link to style.css located in public/css

// the footer file usually contains the code for the footer
// and js scripts

// variables become global when they are included
// but if the file is included in a function, the variables remain local to that function
