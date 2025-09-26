<?php


// method overriding allows a child to provide a implementation of a method already provided by parent

// to override a method, you define it in child class, with the same name, params, and return type

// php will decide which method to call
// if an object of parent class is calling method, the overridden method will be called
// if an object of child class is calling method, the overriding method will be called

class Robot
{
	public function greet()
	{
		return 'Hello!';
	}

    final public function id()
    {
        return uniqid();
    }
}

class Android extends Robot
{	
    public function greet()
	{
        $greeting = parent::greet();
		return $greeting . ' from Android.';
	}
}


$android = new Android();
echo $android->greet(); // Hello! // calling from parent because child does not have it

// redifned greet in Android now...
// added greet() to Android
// update the echo statement will return Hi

$robot = new Robot();

echo $robot->greet(); // Hello

$android = new Android();
echo $android->greet(); // Hi!


// if you need to call the parent method inside the overriding method,
// you CANNOT use $this method
// you need to use scope resolution operator (::)
// IMPORTANT
// updated the greet() function of Adnroid


class BankAccount
{
	private $balance;
	public function __construct($amount)
	{
		$this->balance = $amount;
	}

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

	public function withdraw($amount)
	{
		if ($amount > 0 && $amount <= $this->balance) {
			$this->balance -= $amount;
			return true;
		}
		return false;
	}
}

class CheckingAccount extends BankAccount
{
	private $minBalance;
	public function __construct($amount, $minBalance)
	{
		if ($amount > 0 && $amount >= $minBalance) {
			parent::__construct($amount);
			$this->minBalance = $minBalance;
		} else {
			throw new InvalidArgumentException('amount must be more than zero and higher than the minimum balance');
		}
	}

	public function withdraw($amount)
	{
		$canWithdraw = $amount > 0 && $this->getBalance() - $amount > $this->minBalance;
		if ($canWithdraw) {
			parent::withdraw($amount);
			return true;
		}
		return false;
	}
}


// IMPORTANT
// to prevent the method in child class from overriding the method in parent, prefix the method will final keyword
// added the id() method to Robot class
// if you attempt to override a final method, you will get an error