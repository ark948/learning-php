<?php


// suppose we have the following class

class MyClass
{

    public function __invoke(...$arguments) {
        echo 'Called the __invoke method';
    }

    public function methodName() {

    }

    public static function staticFunction() {

    }
}

// we can create new instances of this class like this, and call methods of it
$instance = new MyClass();
$instance->methodName();

// or for static methods we can call them like this:
MyClass::staticFunction();


// the __invoke magic method allows us to call classes like functions, example
// $instance($args);


$instance(); // Called the __invoke method.

// The $instance is known as a function object or functor.

echo is_callable($instance) ? 'yes' : 'no'; // yes

// practical example
// Suppose that you have an array of customer data
$customers = [
    ['id' => 1, 'name' => 'John', 'credit' => 20000],
    ['id' => 3, 'name' => 'Alice', 'credit' => 10000],
    ['id' => 2, 'name' => 'Bob', 'credit' => 15000]
];

// to sort the customers by name or credit we can use the usort() function
// the second parameter of usort is a callable that determines the order

class Comparator
{
    private $key;
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __invoke($a, $b)
    {
        return $a[$this->key] <=> $b[$this->key];
    }
}

// The __invoke() method returns the result of the comparison of two array elements by a specified key

// sort customers by names
usort($customers, new Comparator('name'));
print_r($customers);

// sort customers by credit
usort($customers, new Comparator('credit'));
print_r($customers);

