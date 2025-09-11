<?php


// ksort() function to sort the keys of an associative array

// The ksort() function sorts the elements of an array by their keys.
//  The ksort() is mainly useful for sorting associative arrays.

// $flags changes the sorting behavior using one or more values 
// SORT_REGULAR, SORT_NUMERIC, SORT_STRING, SORT_LOCALE_STRING, SORT_NATURAL, and SORT_FLAG_CASE.


// To combine the flag values, you use the | operator. For example, SORT_STRING | SORT_NATURAL.

// returns true on success and false on failure

// The following example uses the ksort() function to sort an associative array
$employees = [
    'john' => [
        'age' => 24,
        'title' => 'Front-end Developer'
    ],
    'alice' => [
        'age' => 28,
        'title' => 'Web Designer'
    ],
    'bob' => [
        'age' => 25,
        'title' => 'MySQL DBA'
    ]
];

ksort($employees, SORT_STRING);
print_r($employees);


// The krsort() function is like the ksort() function except that it sorts the keys of an array in descending order
$employees = [
    'john' => [
        'age' => 24,
        'title' => 'Front-end Developer'
    ],
    'alice' => [
        'age' => 28,
        'title' => 'Web Designer'
    ],
    'bob' => [
        'age' => 25,
        'title' => 'MySQL DBA'
    ]
];

krsort($employees, SORT_STRING);
print_r($employees);


