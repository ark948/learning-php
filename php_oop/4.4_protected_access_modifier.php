<?php


// protected properties and methods can be accessed from inside of the class and any child class

class Customer
{
	protected $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
}


class VIP extends Customer
{
	public function getFormattedName()
	{
		return ucwords($this->name);
	}
}


$alex = new VIP('alex ferguson');
echo $alex->getFormattedName(); // this will throw an error

// once $name is changed to protected from private, error will be fixed

class Customer2
{
	protected $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
	protected function format()
	{
		return ucwords($this->name);
	}
	public function getName()
	{
		return $this->format();
	}
}

class VIP2 extends Customer2
{
	protected function format()
	{
		return strtoupper($this->name);
	}
}

$bob = new Customer('bob allen');
echo $bob->getName(); // Bob Allen

$alex = new VIP('alex ferguson');
echo $alex->getName(); // ALEX FERGUSON

