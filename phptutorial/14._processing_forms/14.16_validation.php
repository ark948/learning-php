<?php

// in previous tutorials, we validated fields using filter_input and filter_var, and filter_has_var
// (we checked if data existed in request, then we validated and sanitized it using different filters)

// now we're going to make a reusable function for it

// each field has one or more validatino rules
// example, email is required, and must be a valid email address

// another example, username is required, must be between 3 to some number of characters, and must be alphanumeric

// to achieve this, we can define an array (to keep these rules for each corresponding field)
$fields = [
    'email' => 'required | email',
    'username' => 'required | alphanumeric | between: 3, 255'
];


// here is the full rules we create
$fields = [
    'firstname' => 'required, max:255',
    'lastname' => 'required, max: 255',
    'address' => 'required | min: 10, max:255',
    'zipcode' => 'between: 5,6',
    'username' => 'required | alphanumeric | between: 3,255 | unique: users,username',
    'email' => 'required | email | unique: users,email',
    'password' => 'required | secure',
    'password2' => 'required | same:password'
];

// unique means field must be unique in db table
// secure means field must contain at least one lowercase char, one uppercase char, one special char and one number

// The validation library should have the validate() function 
// that accepts an associative array of data to validate $data and the $fields array that contains the validation rules
// it returns an array that contains validation errors,
// key of each element is the field name and value is the error message

// the validate function will loop over the fields
// then loop through rules for each field, and validates it against each rule.
// if validation fails, it will add an error message to errors array

function validate_v1(array $data, array $fields): array
{
    $errors = [];
    
    foreach ($fields as $field => $option) {
        // get the rules of the field
        $rules = split($option);
        foreach ($rules as $rule) {
            // run validation rule for each field
        }
    }

    return $errors;
}


// since the rules are strings, we need to separate them using the | char.
// also we need to strip all whitespaces
// for all these we define arrow function to
// first split by separator
// then trim each item and return it

// the arrow function accepts a string and a separator.
// the explode() function splits the $str by the $separator. the result of explode() is an array of strings

// then the array_map will execute the trim() on each item, and returns a new array of items with whitespaces removed

function validate_v2(array $data, array $fields)
{

    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    $errors = [];

    foreach ($fields as $field => $option) {
        // get the rules of the field
        $rules =  $split($option, '|');

        foreach ($rules as $rule) {
            // run a validation on each rule
        }
    }

    return $errors;
}

// the $rule may or may not have parameters.
// if it has params it'll contain the : char.
// the following code extracts the rule name and its params
if (strpos($rule, ':')) {
    [$rule_name, $param_str] = $split($rule, ':');
    $params = $split($$param_str, ',');
} else {
    $rule_name = trim($rule);
}

// example: between: 3,255 becomes 'between' and '3,255'

// following uses array destructuring to assign first and second elements of result of $split function to $rule_name and $param_str
[$rule_name, $param_str] = $split($rule, ':');

// $rule_name = 'between';
// $param_str = '3, 255'

function validate_v3(array $data, array $fields): array
{
    $errors = [];
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));
    foreach ($fields as $field => $option) {
        $rules = $split($option, '|');
        foreach ($rules as $rule) {
            $params = [];
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
        }
    }
    return $errors;
}

// now we have fields and their rule names with params
// to execute validation for each rule, we can use a big if-elseif statement
// but that will be hard to maintain, and if we add new rule, we must change the validate function

// instead we use variable functions to be more dyanmic
// $rule_name($data, $field, ...$params);
// between($data, 'username', 3, 255) example

// To prevent the validation function from colliding with the standard function like min, you can prefix our validation function with the string is_.
// For example, the between rule will execute the is_between validation function.

function validate_v4(array $data, array $fields): array
{
    $errors = [];
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));
    foreach ($fields as $field => $option) {
        $rules = $split($option, '|');
        foreach ($rules as $rule) {
            $params = [];
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            $fn = 'is_' . $rule_name;
            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
            }
        }
    }
    return $errors;
}

// we use the is_callable function to check if the is_rule_name is a callable function before calling it

// to return array or errors we define the following cosntant
const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must have between %d and %d characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should have only letters and numbers',
    'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
    'unique' => 'The %s already exists',
];

// in this array, the key is the rule name
// values are error messages with %s or %d placeholders so we can use sprintf() to format them

function validate_v5(array $data, array $fields): array
{
    $errors = [];
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));
    foreach ($fields as $field => $option) {
        $rules = $split($option, '|');
        foreach ($rules as $rule) {
            $params = [];
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            $fn = 'is_' . $rule_name;
            if (is_callable($fn)) {
                $pass = $fn($data, $field , ...$params);
                if (!$pass) {
                    $errors[$field] = sprintf(DEFAULT_VALIDATION_ERRORS[$rule_name], $field, ...$params);
                }
            }
        }
    }
    return $errors;
}


// sometimes we need to pass in custom error messages
// for that we can assign a third parameter to validate() function to store custom messages
function validate_v6(array $data, array $fields, array $messages = []): array
{
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));
    // set the validation messages
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $messages);
    $errors = [];
    foreach ($fields as $field => $option) {
        $rules = $split($option, '|');
        foreach ($rules as $rule) {
            $params = [];
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            $fn = 'is_' . $rule_name;
            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if (!$pass) {
                    $errors[$field] = sprintf($validation_errors[$rule_name], $field, ...$params);
                }
            }
        }
    }
    return $errors;
}


// complete version

/**
 * Validate
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function validate(array $data, array $fields, array $messages = []): array
{
    // Split the array by a separator, trim each element
    // and return the array
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    // get the message rules
    $rule_messages = array_filter($messages, fn($message) =>  is_string($message));
    
    // overwrite the default message
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

    $errors = [];

    foreach ($fields as $field => $option) {

        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            // get rule name params
            $params = [];
            // if the rule has parameters e.g., min: 1
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            // by convention, the callback should be is_<rule> e.g.,is_required
            $fn = 'is_' . $rule_name;

            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if (!$pass) {
                    // get the error message for a specific field and rule if exists
                    // otherwise get the error message from the $validation_errors
                    $errors[$field] = sprintf(
                        $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                        $field,
                        ...$params
                    );
                }
            }
        }
    }

    return $errors;
}


// now we need to define the validation funciton for each rule
function is_required(array $data, string $field): bool
{
    return isset($data[$field]) && trim($data[$field]) !== '';
}

function is_email(array $data, string $field): bool
{
    if (empty($data[$field])) {
        return true;
    }

    return filter_var($data[$field], FILTER_VALIDATE_EMAIL);
}

function is_min(array $data, string $field, int $min): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return mb_strlen($data[$field]) >= $min;
}

function is_max(array $data, string $field, int $max): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return mb_strlen($data[$field]) <= $max;
}

function is_between(array $data, string $field, int $min, int $max): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    $len = mb_strlen($data[$field]);
    return $len >= $min && $len <= $max;
}

function is_alphanumeric(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return ctype_alnum($data[$field]);
}

function is_same(array $data, string $field, string $other): bool
{
    if (isset($data[$field], $data[$other])) {
        return $data[$field] === $data[$other];
    }

    if (!isset($data[$field]) && !isset($data[$other])) {
        return true;
    }

    return false;
}

function is_secure(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return false;
    }

    $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
    return preg_match($pattern, $data[$field]);
}


// to check if a value is unique, we need a database connection
// create a config folder
// then add database.php to config folder
// so the following code need to be added to database.php
const DB_HOST = 'localhost';
const DB_NAME = 'auth';
const DB_USER = 'root';
const DB_PASSWORD = '';

function db()
{
    static $pdo;
    if (!$pdo) {
        $pdo = connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    }
    return $pdo;
}

function is_unique(array $data, string $field, string $table, string $column): bool
{
    if (!isset($data[$field])) {
        return true;
    }
    $sql = "SELECT $column FROM $table WHERE $column = :value";
    $stmt = db()->prepare($sql);
    $stmt->bindValue(":value", $data[$field]);
    $stmt->execute();
    return $stmt->fetchColumn() === false;
}

// to the test the unique rule
// we need to create a new database and a table with username field



// Adding a new validation rule 
// To add a new rule, you need to do two things:
// First, add a default error message to the DEFAULT_VALIDATION_ERRORS array.
const DEFAULT_VALIDATION_ERRORS = [
    // ...
    new_rule => "Error message for the new rule"

];

// Second, define a validation function with the following signature:
// function is_new_rule(array $data, string $field, ....$params) : bool

