<?php


// function method_exists() is used to check if an object or a class has a specific method

// method_exists(object|string $object_or_class, string $method): bool

// examples

// The following example uses the method_exists() function to check if a method exists in the BankAccount
class BankAccount
{
    public function transferTo(BankAccount $other, float $amount)
    {}

    public static function compare(BankAccount $other): bool
    {
        return false;
    }
}

$exists = method_exists(BankAccount::class, 'transferTo');
var_dump($exists); // bool(true)

$exists = method_exists(BankAccount::class, 'deposit');
var_dump($exists); // bool(false)


// Using method_exists() to check if an object has a method
$account = new BankAccount();
$exists = method_exists($account, 'transferTo');
var_dump($exists); // bool(true)

$exists = method_exists($account, 'deposit');
var_dump($exists); // bool(false)


// Using the method_exists function to check if an object has a static method

$exists = method_exists(BankAccount::class, 'compare');
var_dump($exists); // bool(true)

$account = new BankAccount();
$exists = method_exists($account, 'compare');
var_dump($exists); // bool(true)


// method_exists() is often used in MVC frameworks to check if a controller has a certain method before calling it
// suppose we have the following URI:
// /posts/edit/1
// and its controller
class PostsController
{
    public function edit(int $id): void
    { // show the edit post form
    }
}
// And you use the method_exists() function to check whether the edit method exists in the $controller object like this
if(method_exists($controller, $action))
{
    $controller->$action($id);
}

