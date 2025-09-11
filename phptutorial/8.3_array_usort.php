<?php


// usort() function to sort an array using a user-defined comparison function

// by default the sort() function uses the comparison operator to compare the elements

// to specify a custom comparison function, we use usort()

// usort(array &$array, callable $callback): bool
// true on success, false on failure

// the callback has the following syntax
// callback(mixed $x, mixed $y): int
// The $callback function has two parameters which are the array elements to compare.

// The $callback function compares two elements ($x and $y) and returns an integer value:
// zero (0) means $x is equal to $y.
// a negative number means $x is before $y.
// a positive number means $x is after $y.


// example of usort
$numbers = [2, 1, 3];

usort($numbers, function ($x, $y) {
    if ($x === $y) {
        return 0;
    }
    return $x < $y ? -1 : 1;
});

print_r($numbers); // 1 2 3
// callback function returns 0 if two numbers are equal,
//  -1 if the first number is less than the second one, and 1 if the first number is greater than the second one.


// If you use PHP 7 or newer, you can use the spaceship operator (<=>) to make the code more concise
// The spaceship operator compares two expressions and returns -1, 0, or 1 when $x is respectively less than, equal to, or greater than $y. 
// IMPORTANT
$numbers = [2, 1, 3];

usort($numbers, function ($x, $y) {
    return $x <=> $y;
});

print_r($numbers);

// If the callback is simple, you can use an arrow function like this
// php introduced the arrow functions since php 7.4
$numbers = [2, 1, 3];
usort($numbers, fn ($x, $y) =>  $x <=> $y);


// The following example uses the usort() function to sort an array of names by length
$names = [ 'Alex', 'Peter',  'John' ];
usort($names, fn($x,$y) => strlen($x) <=> strlen($y));

var_dump($names);



// The following example uses the usort() function to sort an array of Person objects by the age property
class Person
{
    public $name;
    public $age;
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$group = [
    new Person('Bob', 20),
    new Person('Alex', 25),
    new Person('Peter', 30),
];

usort($group, fn($x, $y) => $x->age <=> $y->age);

// same thing with name property
usort($group, fn($x, $y) => $x->name <=> $y->name);


// The following example uses a static method of class as a callback for the usort() function
class Person
{
    public $name;

    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

class PersonComparer
{
    public static function compare(Person $x, Person $y)
    {
        return $x->age <=> $y->age;
    }
}

$group = [
    new Person('Bob', 20),
    new Person('Alex', 25),
    new Person('Peter', 30),
];

usort($group, ['PersonComparer', 'compare']);

print_r($group);

// To use the compare() static method of the PersonComparer class as the callback the usort() function,
// you pass an array that contains two elements

