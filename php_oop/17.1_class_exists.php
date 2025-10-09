<?php


// function class_exists() checks if a class exists
// class_exists(string $class, bool $autoload = true): bool
// $class specifies the name of the class to check.
// $autoload determines whether to call spl_autoload_register() by default.

// IMPORTANT
// Note that the class_exists() is case-insensitive. It means that if you have a class with the name User, the class_exists(‘user’) will return true.

// examples
class User
{
}

if (class_exists('User')) {
    echo 'The class User exists';
} else {
    echo 'The class User does not exist';
}

// The class User exists

// if a class exists under a namespace
// that namespace must also be included to check if it exists
namespace App;
class User
{
}
if (class_exists('App\User')) {
    echo 'The class App\User exists';
} else {
    echo 'The class Appp\User does not exist';
}

// The class App\User exists

// IMPORTANT
// the class_exists() does not work with aliased class names
use App\User as Account;
var_dump(class_exists('Account')); // bool(false)


// example with spl_autload_register

spl_autoload_register(function ($class) {
    echo 'Loading the class ' . $class . '<br>';
    require $class . '.php';
});

class_exists('App\User');
echo 'Create a new user' . '<br>';

$user = new App\User();
echo $user->avartar();

/*
Loading the class App\User
Create a new user
default{"mode":"full","isActive":false}
*/