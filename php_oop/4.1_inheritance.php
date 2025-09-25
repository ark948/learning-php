<?php


// Inheritance allows a class to reuse the code from another class without duplicating it

// inheritance allows for writing code in parent class and using it in child classes
// parent class is also called base class or super class
// child class is also called derived class or a subclass

// use extends keyword to define a class that inherits from another class

class BankAccount
{
    private $balance;
    public function getBalance()
    {
        return $this->balance;
    }
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }
}

// saving account inherits from bank account

class SavingAccount extends BankAccount
{
    private $interestRate;
    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        // calculate interest
        $interest = $this->interestRate * $this->getBalance();
        // deposit interest to the balance
        $this->deposit($interest);
    }
}
// SavingAccount can use all the non-private properties and methods from BankAccount

$account = new SavingAccount(0);
$account->deposit(100);
echo $account->getBalance(); // 100

// note: parent class cannot use properties and methods from the child class

// child class can have its own properties and methods
// added $interestRate property and setInterestRate() to SavingAccount

// to call methods from parent class use $this keyword

