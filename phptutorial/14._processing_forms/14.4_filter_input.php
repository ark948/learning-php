<?php


// use filter_input() to validate and santize external data

// when dealing with external data, always remember to:
// 1. sanitize and validate data
// 2. escape data before displaying them on a page


// Sanitization disables potential malicious code from data before processing it.
// Validation ensures the data is in the correct format regarding data type, range, and value.


// filter_input() function allows you to get an external variable by its name and filter it using one or more built-in filters.

// syntax
// filter_input ( int $type , string $var_name , int $filter = FILTER_DEFAULT , array|int $options = 0 ) : mixed

// $type is one of INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, and INPUT_ENV.
// $var_name is the name of the variable to filter.
// $filter is the filter id to apply. Here’s the list of valid filters. If you omit the $filter argument,
// the filter_input() function will use the FILTER_DEFAULT filter id, which doesn’t filter anything.
// $options is an associative array that consists of one or more options. 
// You can use one or more flags when a filter accepts the options. 
// If you want to use multiple flags, you need to separate them by the (|), e.g., FILTER_SANITIZE_ENCODED | FILTER_SANITIZE_SPECIAL_CHARS.



// refer to filter_data/form.php for an example

// filter_input should be used on external values
// filter_var should be used for variables you already have