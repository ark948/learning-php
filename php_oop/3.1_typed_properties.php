<?php

declare(strict_types=1);

// in this lesson we'll add type hints to properties and methods

class BankAccount
{
    public float $balance = 0;
    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

// when this class is first instantiated, the $balance property is null

// php 7.4 added type hints to properties and methods
// any type except void and callable
// added float to balance property

// if you add a type to a property, that property is no longer null
// and if try to access it before initialization, a Fatal Error will be raised

// for properties with scalar types, you can provide a default value to initialize them
// balance is has default value of 0

// constrcutor can also contain typed properties
// added constructor

$account = new BankAccount(100);
print($account->balance); // 100

// If you unset a typed property, its status will change back to uninitialized.
// Note that for an untyped property, its value will become null after unset.
$account = new BankAccount(0);
echo $account->balance; // 0

unset($account->balance);
echo $account->balance; // error

// if you assign for example a string to a property with float type hint
// php will attempt to convert the string to float
$account = new BankAccount("100.5"); // error
echo $account->balance; // 100.5


// this behavior can be disabled, by declaring strict_types at the beginning of the script
// add declare(strict_types=1); to top of the script