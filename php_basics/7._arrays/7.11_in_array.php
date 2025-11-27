<?php


// use in_array() to check if a value exist in an array

// The following example uses the in_array() function to check if the value 'update' is in the $actions array
$actions = [
	'new',
	'edit',
	'update',
	'view',
	'delete',
];

$result = in_array('update', $actions);

var_dump($result); // bool(true)


// The following example returns false because the value 'New' doesn’t exist in the $actions array. Note that the in_array() compares the strings case-sensitively
$actions = [
	'new',
	'edit',
	'update',
	'view',
	'delete',
];

$result = in_array('New', $actions);

var_dump($result); // bool(false)


// The following example uses the in_array() function to find the number 15 in the $user_ids array.
// It returns true because the in_array() function compares the values using the loose comparison (==)
$user_ids = [10, '15', '20', 30];

$result = in_array(15, $user_ids);

var_dump($result); //  bool(true)

// To use the strict comparison, you pass true to the third argument ($strict) of the in_array()
$user_ids = [10, '15', '20', 30];

$result = in_array(15, $user_ids, true);

var_dump($result); //  bool(false)



// The following example uses the in_array() function with the searched value is an array
$colors = [
	['red', 'green', 'blue'],
	['cyan', 'magenta', 'yellow', 'black'],
	['hue', 'saturation', 'lightness']
];

if (in_array(['red', 'green', 'blue'], $colors)) {
	echo 'RGB colors found';
} else {
	echo 'RGB colors are not found';
}

// RGB colors found

// This example illustrates how to use the in_array() function to check if a Role object exists in an array of Role objects
class Role
{
	private $id;
	private $name;
	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}
}

$roles = [
	new Role(1, 'admin'),
	new Role(2, 'editor'),
	new Role(3, 'subscribe'),
];

if (in_array(new Role(1, 'admin'), $roles)) {
	echo 'found it';
}

// found it!


// If you set the $strict to true, the in_array() function will compare objects using their identities instead of values. 
if (in_array(new Role(1, 'admin'), $roles, true)) {
	echo 'found it!';
} else {
	echo 'not found!';
}

// not found

