<?php


// The filter_var() function allows you to filter a variable using a validation or sanitization filters

// takes three params, $value is the value you want to validate or sanitize
// $filter is filter id to apply. this will determine how the function will filter the value
// an associative array of filter options, or a list of flags separated by |

// The filter() function returns the filtered value, or false if fails


// example of filter_var to validate data
$id = '100';

$result = filter_var($id, FILTER_VALIDATE_INT);
echo $result === false ? "Invalid ID" : "Valid ID: $result"; // Valid ID: 100

// The FILTER_VALIDATE_INT validates if $id is an integer
// In this example, the value of the $id is a string '100', the function converts it to an integer 100.

// if you change the value of id to 'abc', this example will return false

// The following example uses the filter_var function to check if id is an integer and in the range of 1 and 100

$id = 120;
$result = filter_var($id, FILTER_VALIDATE_INT, [
    'options' => [
        'min_range' => 1,
        'max_range' => 100,
    ]
]);

echo $result === false ? "Invalid ID" : "Valid ID: $result"; // Invalid ID


// The following example uses the filter_var() function to sanitize a number
$id = '120abc';
$result = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
echo $result === false ? "Invalid ID" : "Valid ID: $result"; // valid id 120


