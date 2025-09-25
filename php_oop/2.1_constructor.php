<?php


// constructor is a method that allows for initialization of a class

// when an a class is instantiated, this method is automatically called

class BankAccount1
{
    private $accountNumber;
    private $balance;
    public function __construct($accountNumber, $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }
}

$account = new BankAccount1(1, 100);

// Constructor property promotion
// when declaring cosntructor method, we need to also delcare the arguments and assign them to their corresponding properties
// php 8.0 introduced a quicker syntax
class BankAccount2
{
    public function __construct( private $accountNumber, private $balance, $type )
    {
    }
}

// if you don't want to promote a constructor argument (have it be a regular argument)
// just omit the access modifier
// i added the $type arguemnt
// now, $tpye is just a regular parameter and not a property

// Notice that the order of promoted-argument and non-promoted arguments can appear in the constructor in any order.
