<?php


// $this keyword references the current object of the class.
// it allows to access properties and methods of the current class

// $this only exists inside the class

class BankAccount
{
	public $accountNumber;
	public $balance;
	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
		}
        // to allow for method chaining
        return $this;
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


$account = new BankAccount();

$account->accountNumber = 1;
$account->balance = 100;


// this
$account->deposit(100);
$account->deposit(200);
$account->deposit(300);

// can be written as this as well, it is called method chaining
$account->deposit(100)
        ->deposit(200)
        ->deposit(300);

// to make this possible (to form the chain), deposit() needs to return the BankAccount object.
// so i added the return $this to deposit() method

// this is also possible
$account->deposit(100)
        ->withdraw(150);

