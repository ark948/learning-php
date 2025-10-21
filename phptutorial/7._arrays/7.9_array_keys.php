<?php


// to get all the keys of an array use array_keys()

// array_keys ( array $array , mixed $search_value , bool $strict = false ) : array

// $array is the input array.
// $search_value specifies the value of the keys to search for.
// $strict if it sets to true, the array_keys() function uses the identical operator (===) for matching the search_value with the array keys.
//  Otherwise, the function uses the equal operator (==) for matching.


// The array_keys() function returns an array that contains all the keys in the input array.

$numbers = [10, 20, 30];

$keys = array_keys($numbers);

print_r($keys);

// Array
// (
//     [0] => 0
//     [1] => 1
//     [2] => 2
// )


// The following example uses the array_keys() function to get the keys of the array whole value is 20
$numbers = [10, 20, 30];

$keys = array_keys($numbers, 20);

print_r($keys);
// Array
// (
//     [0] => 1
// )

// (the position with index 1 has the value of 20)

// for associative arrays

$user = [
	'username' => 'admin',
	'email' => 'admin@phptutorial.net',
	'is_active' => '1'
];

$properties = array_keys($user);
print_r($properties);
// Array
// (
//     [0] => username
//     [1] => email
//     [2] => is_active
// )



$properties = array_keys($user, 1);
print_r($properties);
// Array ( [0] => is_active )
// by default array_key() uses the == operator for comparison
// so in this example, 1 == '1' is true

// to enable strict equality ===, pass true to the third argument of array_keys() function
$properties = array_keys($user, 1, true);

print_r($properties); // Array ( )

// The following function returns the keys of an array, which pass a test specified a callback
function array_keys_by(array $array, callable $callback): array
{
	$keys = [];
	foreach ($array as $key => $value) {
		if ($callback($key)) {
			$keys[] = $key;
		}
	}
	return $keys;
}

// example
// The following example uses the array_keys_by() function to find the keys that contain the string 'post'
$permissions = [
	'edit_post' => 1,
	'delete_post' => 2,
	'publish_post' => 3,
	'approve' => 4,
];

$keys = array_keys_by($permissions, function ($permissions) {
    return strpos($permissions, 'post');
});

// Array ( [0] => edit_post [1] => delete_post [2] => publish_post )

