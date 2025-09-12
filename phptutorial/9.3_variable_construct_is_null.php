<?php


// is_null() accepts a variable and returns true if var is null
// false otherwise
// NOTE: is_null() will also throw a warning if var does not exist also returns true

var_dump(is_null($count));

$count = null;
var_dump(is_null($count)); // true

$count = 1;
var_dump(is_null($count)); // false

$colors = [
    'text' => 'black',
    'background' => 'white'
];

var_dump(is_null($colors['link'])); // Undefined array key, bool(true)



$message = 'Hello';
var_dump(is_null($message[5])); 
// Warning: Uninitialized string offset 5 in php-wasm run script on line 5 bool(false)


// The echo displays an empty string for the false value, which is not intuitive. 
// The following defines a function that displays false as the string false instead of an empty string
function echo_bool_0(string $title, bool $v): void
{
    echo $title, "\t", $v === true ? 'true' : 'false', PHP_EOL;
}


// Comparing a falsy value with null using the equal operator (==) will return true.
function echo_bool(string $title, bool $v): void
{
    echo $title, "\t", $v === true ? 'true' : 'false', PHP_EOL;
}

echo_bool('null == false:', null == false);
echo_bool('null == 0:', null == 0);
echo_bool('null == 0.0:', null == 0.0);
echo_bool('null =="0":', null == false);
echo_bool('null == "":', null == '');
echo_bool('null == []:', null == []);
echo_bool('null == null:', null == null);
// all of them true


// The following example uses the identity operator (===) to compare null with falsy values, only null === null returns true.
echo_bool('null === false:', null === false);
echo_bool('null === 0:', null === 0);
echo_bool('null === 0.0:', null === 0.0);
echo_bool('null ==="0":', null === false);
echo_bool('null === "":', null === '');
echo_bool('null === []:', null === []);
echo_bool('null === null:', null === null);
// all of them false, except null === null



// using the isnull()
echo_bool('is_null(false):', is_null(false));
echo_bool('is_null(0):', is_null(0));
echo_bool('is_null(0.0)', is_null(0.0));
echo_bool('is_null("0"):', is_null("0"));
echo_bool('is_null(""):', is_null(""));
echo_bool('is_null([]):', is_null([]));
echo_bool('is_null(null):', is_null(null));
// all of them false, except is_null(null)
// The is_null() and identity operator (===) return the same result.