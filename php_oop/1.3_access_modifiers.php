<?php


// access modifiers control how properties and methods of a class are accessed

// there are three access modifiers public, private, protected

// public allows for accessing properties and methods from both inside and outside of the class
// private allows for accessing properties and methods only from inside of the class

// protected comes later

class Customer
{
	private $name;
	public function setName($name)
	{
		$name = trim($name);
		if ($name == '') {
			return false;
		}
		$this->name = $name;
                return true;
	}
	public function getName()
	{
		return $this->name;
	}
}


$customer = new Customer();
// $customer->name = 'Bob'; this will throw an error
echo $customer->getName(); // Bob

// in order to manipulate the value of a private property we use getter and setter

// using getter and setter is recommended
// they also provide custom logic

