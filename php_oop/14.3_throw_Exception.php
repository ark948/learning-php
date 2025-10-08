<?php


// in situations where recovery is not possible, we throw an exception

// it is an instance of Exception class
// use the new keyword

// an Exception object has two main properties, a message and a numeric error code
// numeric code is optional

$exception = new Exception('Invalid username or password', 100);

// Exception object has getMessage() and getCode() that return the message and the code

$message =  $exception->getMessage();
$code =  $exception->getCode();

// in practice, we usually raise (or throw) the exception, instead of assigning it to a variable
throw new Exception('Invalid username or password', 100);

// the throw statement accepts Exception or any class or subclass that implements the Throwable interface
// the Exception class also implements Throwable interface

// codes after the throw statement will not execute (script will be halted)

// example
// divide helper function with throw Exception
function divide($x, $y)
{
    if (!is_numeric($x) || !is_numeric($y)) {
        // if any of the args were not a number
        throw new InvalidArgumentException('Both arguments must be numbers or numeric strings');
    }
    if ($y == 0) {
        throw new Exception('Division by zero, y cannot be zero');
    }
    return $x / $y;
}

// the php standard library (SPL) has many subclasses of Exception
