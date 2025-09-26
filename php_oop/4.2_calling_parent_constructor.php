<?php


class BankAccount
{
	private $balance;
	public function __construct($balance)
	{
		$this->balance = $balance;
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
}


// the SavingAccount class inherits from BankAccount and does not have its own constructor
class SavingAccount extends BankAccount
{
	private $interestRate;

    public function __construct($balance, $interestRate)
	{
        parent::__construct($balance);
		$this->interestRate = $interestRate;
	}

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function addInterest()
	{		// calculate interest
		$interest = $this->interestRate * $this->getBalance();
		// deposit interest to the balance
		$this->deposit($interest);
	}
}


// by default if no constructor is defined for child class, php will use the constructor of parent class
// but if it has its own constructor, it will be called not the parent constructor

// but if it is needed to call the constructor along with the child's own constructor, there is a way
// added the code to combine BankAccount constructor and SavingAccount constructor
// so that both $balance and $interestRate can be initialized

$account = new SavingAccount(100, 0.05);
$account->addInterest();
echo $account->getBalance();