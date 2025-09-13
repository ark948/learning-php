<?php



// array_map() function creates a new array whose elements result from applying a callback to each element.


// Suppose that you have an array that holds the lengths of squares:
$lengths = [10, 20, 30];

// we can use foreach to calculate the areas of squares
// calculate areas
$areas = [];

foreach ($lengths as $length) {
	$areas[] = $length * $length;
}

print_r($areas); // 100 400 900


// Alternatively, you can use the array_map() function that achieves the same result
// calculate areas

$areas = array_map(function ($length) {
	return $length * $length;
}, $lengths);


print_r($areas); // [100, 400, 900] it returns a new array


// since php 7.4 we can use arrow functions
$areas = array_map( fn ($length) => $length * $length, $lengths );

print_r($areas);


// here is the syntax of array_map()
// array_map ( callable|null $callback , array $array , array ...$arrays ) : array

// The following illustrates how to use the array_map() function to get a list of usernames from the the $users array
// which is a array of User objects

class User
{
	public $id;

	public $username;

	public $email;

	public function __construct(int $id, string $username, string $email)
	{
		$this->id = $id;
		$this->username = $username;
		$this->email = $email;
	}
}

$users = [
	new User(1, 'joe', 'joe@phptutorial.net'),
	new User(2, 'john', 'john@phptutorial.net'),
	new User(3, 'jane', 'jane@phptutorial.net'),
];

$usernames = array_map( fn ($user) => $user->username, $users );

print_r($usernames); // joe john jane


// The callback function argument of the array_map() can be a public method of a class.
class Square
{
	public static function area($length)
	{
		return $length * $length;
	}
}

$lengths = [10, 20, 30];
$areas = array_map('Square::area', $lengths);


print_r($areas);