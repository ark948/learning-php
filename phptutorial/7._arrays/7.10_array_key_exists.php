<?php


// use array_key_exists() to determine if a key exists in an array

// array_key_exists ( string|int $key , array $array ) : bool

// returns true if key exists and false otherwise

// this function only searches in the first dimension of array
// if array is multidimensional, further efforts needs to be made

$roles = [
	'admin' => 1,
	'approver' => 2,
	'editor' => 3,
	'subscriber' => 4
];

$result = array_key_exists('admin', $roles);
var_dump($result); // bool(true)


// another example
$roles = [
	'admin' => 1,
	'approver' => 2,
	'editor' => 3,
	'subscriber' => 4
];

$result = array_key_exists('publisher', $roles);
var_dump($result); // bool(false)


// isset() can also be used, sometimes, i guess
$roles = [
	'admin' => 1,
	'approver' => 2,
	'editor' => 3,
	'subscriber' => 4
];

var_dump(isset($roles['approver']));  // bool(true)
var_dump(array_key_exists('approver', $roles)); // bool(true)


// the following example returns false, becuase the key 'user' does not exist
$roles = [
	'admin' => 1,
	'approver' => 2,
	'editor' => 3,
	'subscriber' => 4
];

var_dump(isset($roles['user']));  // bool(false)
var_dump(array_key_exists('user', $roles)); // bool(false)

// However
// However, if the value of a key is null, the isset() will return false while the array_key_exists() function returns true.
$post = [
	'title' => 'PHP array_key_exists',
	'thumbnail' => null
];

var_dump(array_key_exists('thumbnail', $post)); // bool(true)
var_dump(isset($post['thumbnail'])); // bool(false)