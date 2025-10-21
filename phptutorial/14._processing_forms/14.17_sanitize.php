<?php

// in this lesson we'll buiild a reusable function to sanitize input

// we sanitize data from untrusted sources

// sanitizing input means removing illegal characters using deleting, replacing, encoding, or escaping

// php provides some sanitizing filters
// filter_input(), filter_var(), filter_input_array(), filter_var_array()

// suppose we have the following fields in the $_POST variable: name, email, age, weight, homepage

// the sanitize function accepts two args, the inputs param is an associative array that could $_GET or $_POST or a regular array
// the fields param is an array that specifies a list of fields with rules

// here is the fields array

$fields = [
    'name' => 'string',
    'email' => 'email',
    'age' => 'int',
    'weight' => 'float',
    'github' => 'url',
    'hobbies' => 'string[]'
];

// string[] means an array of strings

// we'll iterate over the fields and use the corresponding filter for each

// here is a mapping of filters based on each rule
const FILTERS = [
    'string' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'string[]' => [
        'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'email' => FILTER_SANITIZE_EMAIL,
    'int' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_SCALAR
    ],
    'int[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'float' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_FLAG_ALLOW_FRACTION
    ],
    'float[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'url' => FILTER_SANITIZE_URL,
];


// to sanitize multiple fields at a time you can use the filter_var_array()
// filter_var_array($inputs, $options)

// an example of $options
$options = [
    'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
    'age' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_SCALAR
    ],
    'weight' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_FLAG_ALLOW_FRACTION
    ],
    'github' => FILTER_SANITIZE_URL,
];


// the sanizite function so far
function sanitize_1(array $inputs, array $fields): array
{
    $options = array_map(
        fn($field) => FILTERS[$field], $fields
    );
    return filter_var_array($inputs, $options);
}


// sanitize_1 uses the FILTERS constant, to make it more flexible, we can add a param and set its default to FILTERS
function sanitize_2(array $inputs, array $fields, array $filters = FILTERS): array
{
    $options = array_map(fn($field) => $filters[$field], $fields);
    return filter_var_array($inputs, $options);
}

// Also, you may want to sanitize the fields in the $inputs using one filter e.g., FILTER_SANITIZE_STRING.
// to do that:
// First, make the $fields parameter optional and set its default value to an empty array [].
// Second, add a default filter parameter.
// Third, if the $filters array is empty, use the default filter.

function sanitize_3(array $inputs, array $fields = [], int $default_filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS, array $filters = FILTERS): array
{
    if ($fields) {
        $options = array_map(fn($field) => $filters[$field], $fields);
        return filter_var_array($inputs, $options);
    }

    return filter_var_array($inputs, $default_filter);
}

// to remove whitespaces from a string we use the trim() function
// to remove whitespaces of an array of strings we use array_map() along with trim()

$trimmed_data = array_map('trim', $inputs);

// however, $inputs may contain items that are not strings, to trim strings only, we can use is_string() to check if the item is string
$trimmed_data = array_map(function ($item) {
    if (is_string($item)) {
        return trim($item);
    }
    return $item;
}, $inputs);

// The $inputs may contain an item that is an array of strings. For example
$inputs = [
    'hobbies' => [
        ' Reading',
        'Running ',
        ' Programming '
    ]
];

// to trim nested strings, we need to use recursive function
function array_trim(array $items): array
{
    return array_map(function ($item) {
        if (is_string($item)) {
            return trim($item);
        } elseif (is_array($item)) {
            return array_trim($item);
        } else
            return $item;
    }, $items);
}

// to call array_trim() from sanitize(), we add a new param
// we add a new param called $trim and set its default to true
// then we call array_trim() if $trim param is true
function sanitize_4(array $inputs, array $fields = [], int $default_filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS, array $filters = FILTERS, bool $trim = true): array
{
    if ($fields) {
        $options = array_map(fn($field) => $filters[$field], $fields);
        $data = filter_var_array($inputs, $options);
    } else {
        $data = filter_var_array($inputs, $default_filter);
    }

    return $trim ? array_trim($data) : $data;
}

// make new file -> sanitization.php
// refer to sanitization_example.php