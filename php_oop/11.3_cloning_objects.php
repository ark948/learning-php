<?php


// to clone an object, means to create a copy of an object.

// the clone keyword allows for a shallow copy of an object to be created.
// by combining the clone keyword and __clone() magic method, you perform a deep copy

class Person
{
	public $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
}

// copy using the assignment operator
$bob = new Person('Bob');
// assign bob to alex and change the name
$alex = $bob;

$alex->name = 'Alex';
// show both objects
var_dump($bob);
var_dump($alex);
// both will display Alex
// var_dump() will show one object
// IMPORTANT
// both bob and alex reference the same object in memory


// the clone keyword allows for shallow copy
$alex = clone $bob;
$alex->name = 'Alex';

var_dump($bob->name); // Bob
var_dump($alex->name); // Alex
// now, there are two objects in memory


// If you define the clone() magic method, PHP will execute it automatically when the cloning completes. 
// a shallow copy means:
// Create a copy of all properties of an object.
// If a property references another object, the property remains a reference.

// example
class Address
{
	public $street;
	public $city;
}

class Person
{
	public $name;
	public $address;
	public function __construct($name)
	{
		$this->name = $name;
		$this->address = new Address();
	}
}

// The following creates a new Person object called $bob and assigns the properties of the address property:
$bob = new Person('Bob');
$bob->address->street = 'North 1st Street';
$bob->address->city = 'San Jose';

// The following creates a copy of the $bob object and assigns it to $alex. It also changes the value of the $name property to 'Alex':
$alex = clone $bob;
$alex->name = 'Alex';
// IMPORTANT
// even though alex is different than bob, their address references the same object
// since this is a shallow copy
// changing either address or city, will affect both objects


// Deep copy with __clone() magic method
// Deep copy creates a copy of an object and recursively creates a copy of the objects referenced by the properties of the object

class Address2
{
	public $street;
	public $city;
}

class Person2
{
	public $name;
	public $address;
	public function __construct($name)
	{
		$this->name = $name;
		$this->address = new Address2();
	}
	public function __clone()
	{
		$this->address = clone $this->address;
	}
}

$bob = new Person('Bob');
$bob->address->street = 'North 1st Street';
$bob->address->city = 'San Jose';

$alex = clone $bob;
$alex->name = 'Alex';
$alex->address->street = '1 Apple Park Way';
$alex->address->city = 'Cupertino';

var_dump($bob->address->city); // San Jose
var_dump($alex->address->city); // Cupertino


// Another way to carry a deep copy of an object is to use the serialize() and unserialize() functions
// The serialize() function creates a storable representation of an object while the unserialize() function creates an object from the storable value.
// you can use the following helper function for that
function deep_clone($object)
{
	return unserialize(serialize($object));
}

