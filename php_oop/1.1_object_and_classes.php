<?php


// all objects have two things in common: state and behavior

// objects hold their state in variables which in oop are called properties
// and their behavior as functions that are known as methods

// to define a class in php, use class keyword followed by class name (convention is PascalCase and in singular)
// define each class in a separate php file

class BankAccount
{
    public $accountNumber;
    public $balance;

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

}

// to create new objects of that class use the new keyword
$account = new BankAccount();

// the parentheses are optional
$account2 = new BankAccount;

// we can add properties to class, i added accountNumber and balance
// the public keyword determines the visibility of the property

// to access a property we use the object operator ->
// $object->proprety;


$account->accountNumber = 1;
$account->balance = 100;

echo "The bank account number is $account->accountNumber"; // 1
echo "And the balance is $account->balance"; // 100

$account->deposit(50);

echo "New balance is: $account->balance";

// besides public keyword, php also has private and protected

// methods also take a visibility modifier (if not provided the default is public)
// added the deposit() method
// the $this variable represents the current object

// added the withdraw() method
// the withdraw method checks the current balance, if balance is less than the withdrawal amount,
// the withdraw method returns false.
