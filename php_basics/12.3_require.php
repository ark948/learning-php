<?php


// PHP require construct loads the code from a file into a script and executes that code.

// what is the difference between include and require
// if include could not find the file, it will only raise a warning
// require on the other hand will raise a fatal error and fully halts the script.

// In practice, you often use the require construct to load the code from libraries.
//  Since the libraries contain the required functions to execute the script, 
// it’s better to use the require construct than the include construct.


require 'functions.php';

dd([1, 2, 3]);

// require is not a function
// the following works, but the parentheses are not part of the require
// they belong to file path expression
require('functions.php');

// PHP require_once is the counterpart of the include_once
require_once('functions.php');

