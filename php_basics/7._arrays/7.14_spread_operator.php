<?php


// php spread operator can be used to merge multiple arrays into a single one
// introduced in php 7.4


$numbers = [4,5];
$scores = [1,2,3, ...$numbers];

print_r($scores);
// Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )


// IMPORTANT
// the spread operator performs better than array_merge
// since it is a language construct

// Unlike argument unpacking, you can use the spread operator anywhere. 
// example, you can use the spread operator at the beginning of the array
$numbers = [1,2];
$scores = [...$numbers, 3, 4];

print_r($scores);


// or in the middle of an array
$numbers = [2,3];
$scores = [1, ...$numbers, 4];

print_r($scores);

// or multiple times
$even = [2, 4, 6];
$odd = [1, 2, 3];
$all = [...$odd, ...$even];

print_r($all);


// using spread operator to unpack the return of a function call
function get_random_numbers()
{
    for ($i = 0; $i < 5; $i++) {
        $random_numbers[] = rand(1, 100);
    }
    return $random_numbers;
}

$random_numbers = [...get_random_numbers()];

print_r($random_numbers);


// or with a generator
function even_number()
{
    for($i =2; $i < 10; $i+=2){
        yield $i;
    }
}

$even = [...even_number()];

print_r($even);
// Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )


// PHP allows you to apply the spread operator not only to an array but also to any object that implements the Traversable interface.
class RGB implements IteratorAggregate
{
    private $colors = ['red', 'green', 'blue'];
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->colors);
    }
}

$rgb = new RGB();
$colors = [...$rgb];

print_r($colors); // Array ( [0] => red [1] => green [2] => blue )


// passing arguments to function using spread operator
function format_name(string $first, string $middle, string $last): string
{
    return $middle ? "$first $middle $last" : "$first $last";
}
$names = [
    'first' => 'John',
    'middle' => 'V.',
    'last' => 'Doe'
];

echo format_name(...$names); // John V. Doe

