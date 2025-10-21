<?php

// The filter_has_var() function checks if a variable of a specific input type exists.
// The filter_has_var() function is a part of PHP’s filter extension.


// syntax
// filter_has_var ( int $input_type , string $var_name ) : bool

// The function has the two parameters:
// $input_type is the type of input that you want to check for a variable.
// The valid input types are INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, or INPUT_ENV.
// $var_name is the name of the variable to check.

// The filter_has_var() function returns true if the $var_name exists in the $input_type or false otherwise.

// The filter_has_var() function only checks if a variable exists. It does not validate or sanitize the input.
// Typically, you’ll use the filter_has_var() function with other functions like filter_input() or filter_var() to deal with security.

// The following example uses the filter_has_var() function to check if the term exists in the INPUT_GET:
if (filter_has_var(INPUT_GET, 'term')) {
    echo 'Term is set in GET: ' . $_GET['name'];
} else {
    echo "Term is not set.";
}

// The following example shows how to use the filter_has_var() function to check if the email exists in INPUT_POST
if (filter_has_var(INPUT_POST, 'email')) {
    echo 'Email is set: ' . $_POST['email'];
} else {
    echo 'Email is not set';
}



// filter_has_var vs. isset 
if(isset($_POST['name'])) {
    // process the name
}

// In this example, the isset() checks if the $_POST variable has a key 'name' and the $_POST['name'] is not null
// However, the isset() doesn’t check whether the name variable comes from the HTTP request or not. For example
$_POST['email'] = 'example@phptutorial.net';

if(isset($_POST['email'])) { // return true
    // ...
}


// in this example, email was set manually

// but unlike isset(), filter_has_var() does not read the content of $_POST array.
// it checks the variables in request's body
// therefore it returns false for the following
$_POST['email'] = 'example@phptutorial.net';

if(filter_has_var(INPUT_POST, 'email')) { // return false
    // ...
}

