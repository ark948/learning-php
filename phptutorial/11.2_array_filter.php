<?php



// When you want to filter elements of an array, 
// you often iterate over the elements and check whether the result array should include each element.


// The following example uses the foreach statement to iterate over the elements of the $numbers array and filter the odd numbers:
$numbers = [1, 2, 3, 4, 5];
$odd_numbers = [];

foreach ($numbers as $number) {
    if ($number % 2 === 1) {
        $odd_numbers[] = $number;
    }
}

print_r($odd_numbers); // 1 3 5


// The array_filter() function makes the code less verbose and more expressive
$numbers = [1, 2, 3, 4, 5];
$odd_numbers = array_filter(
	$numbers,
	function ($number) {
		return $number % 2 === 1;
	}
);

print_r($odd_numbers);


// arrow functions since php 7.4
$numbers = [1, 2, 3, 4, 5];
$odd_numbers = array_filter(
	$numbers,
	fn ($number) => $number % 2 === 1
);

print_r($odd_numbers);


// syntax
// array_filter ( array $array , callable|null $callback = null , int $mode = 0 ) : array

// The array_filter() function iterates over the elements of the $array and passes each element to the $callback function.
//  If the callback function returns true, the array_filter() function includes the element in the result array.

// odd numbers
$numbers = [1, 2, 3, 4, 5];
$even_numbers = array_filter(
	$numbers,
	function ($number) {
		return $number % 2 === 0;
	}
);

print_r($even_numbers); // 2, 4


// Besides a callback, you can pass a method of a class to the array_filter() function
// array_filter($items,[$instance,'callback']);

class Odd
{
    public function isOdd($num)
    {
        return $num % 2 === 1;
    }
}

$numbers = [1, 2, 3, 4, 5];
$odd_numbers = array_filter( $numbers, [new Odd(), 'isOdd'] ); // Array ( [0] => 1 [2] => 3 [4] => 5 )

// for static methods
class Even
{
    public static function isEven($num)
    {
        return $num % 2 === 0;
    }
}

$even_numbers = array_filter($numbers, ['Even','isEven']);


// From PHP 5.3, if a class implements the __invoke() magic method, you can use it as a callable
class Positive
{
	public function __invoke($number)
	{
		return $number > 0;
	}
}

$numbers = [-1, -2, 0, 1, 2, 3];
$positives = array_filter($numbers, new Positive());

print_r($positives);


// for associative arrays
// Sometimes, you want to pass the key, not the value, to the callback function. 
// In this case, you can pass ARRAY_FILTER_USE_KEY as the third argument of the array_filter() function. 

$inputs = [
	'first' => 'John',
	'last' => 'Doe',
	'password' => 'secret',
	'email' => 'john.doe@example.com'
];

$filtered = array_filter(
	$inputs,
	fn ($key) => $key !== 'password',
	ARRAY_FILTER_USE_KEY
);
print_r($filtered);

// To pass both the key and value of the element to the callback function,
// you pass the ARRAY_FILTER_USE_BOTH value as the third argument of the array_filter() function. 
$inputs = [
	'first' => 'John',
	'last' => 'Doe',
	'password' => 'secret',
	'email' => ''
];

$filtered = array_filter(
	$inputs,
	fn ($value, $key) => $value !== '' && $key !== 'password',
	ARRAY_FILTER_USE_BOTH
);

print_r($filtered); // Array ( [first] => John [last] => Doe )



