<?php


// in this lesson we will define a filter() function that sanitizes and validates data

// this lesson uses the two previous lessons where we defined a sanitize and validate function

// filter function will utilize both of these functions
function filter_1(array $data, array $fields, array $messages=[]): array
{
    // implementation
    return [];
}

// example
[$inputs, $errors] = filter_1($_POST, [
    'name' => 'string | required | max: 255',
    'email' => 'email | required | email',
]);



// what happens inside filter functino?

// for example if we look at the provided example above
// the name field has a string filter rule and required | max:255 validation rule
// we need to extract the filter and validation rule

$sanitization_rules = [];
$validation_rules = [];

foreach ($fields as $field => $rules) {
    if (strpos($rules, '|')) {
        [$sanitization_rules[$field], $validation_rules[$field] ] =  explode('|', $rules, 2);
    } else {
            $sanitization_rules[$field] = $rules;
    }
}

// this is an examle of what happens
// For example, if you have the following fields:
[
    'name' => 'string | required | max: 255',
    'email' => 'email | required | email',
];

// The $sanitization_rules will be:
[
    'name' => 'string',
    'email' => 'email',
];

// And the validation_rules will be:
[
    'name' => 'required | max: 255',
    'email' => 'required | email',
];

// after separating the santization rules and validation rules
// we can call corresponding functions in sequence
$inputs = sanitize($data, $sanitization_rules);
$errors = validate($inputs, $validation_rules, $messages);

// and return both results in one array

// here is the full version
function filter(array $data, array $fields, array $messages=[]) : array
{
    $sanitization_rules = [];
    $validation_rules  = [];

    foreach ($fields as $field=>$rules) {
        if (strpos($rules, '|')) {
            [$sanitization_rules[$field], $validation_rules[$field] ] =  explode('|', $rules, 2);
        } else {
            $sanitization_rules[$field] = $rules;
        }
    }

    $inputs = sanitize($data, $sanitization_rules);
    $errors = validate($inputs, $validation_rules, $messages);

    return [$inputs, $errors];
}


// here is an example
$data = [
    'name' => '',
    'email' => 'john$email.com',
];

$fields = [
    'name' => 'string | required | max: 255',
    'email' => 'email | required | email'
];

[$inputs, $errors] = filter($data, $fields);

print_r($inputs);
print_r($errors);

// output
/*

Array
(
    [name] => Please enter the name
    [email] => The email is not a valid email address
)

*/