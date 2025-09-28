<?php


// __toString() is the magic method to add a string representation to an object

// accepts no params and returns a string

// it is invoked when you use an object as if it were a string
// if it does not exist, php will raise an error

class BankAccount
{
	private $accountNumber;

	private $balance;

	public function __construct( $accountNumber, $balance ) {
		$this->accountNumber = $accountNumber;
		$this->balance = $balance;
	}

    public function __tostring() {
        return "Bank Account: $this->accountNumber. Balance: $$this->balance";
    }
}


$account = new BankAccount('123456789', 100);
// echo $account; // this will raise an error, class could not be converted to string
// to solve this error, __toString() needs to be implemented

// in php 7.4, __toString() must return a string
// php does not coerce the number to a string in this case

class Quarter
{
	private $number;
	public function __construct($number)
	{
		if ($number < 0 && $number > 4) {
			throw new InvalidArgumentException('Quarter must be between 1 and 4');
		}
		$this->number = $number;
	}
	public function __toString()
	{
		return $this->number;
	}
}

$quarter = new Quarter(1);
echo $quarter;

// In PHP 8, you’ll get the same error. However, if you disable the strict typing, PHP will coerce the return value to a string value
// To disable the strict type, you the following statement to the top of the script
// declare(strict_types=0);

// if strict_typing is disabled, it will convert, otherwise error will be raised
