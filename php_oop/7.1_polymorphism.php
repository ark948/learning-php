<?php


// Polymorphism is a Greek word that literally means many forms. 
// in OOP concepts polymorphism is closely related to inheritance.

// Polymorphism allows objects of different classes to respond differently based on the same message

// in php to implement polymorphism, we can use either abstract classes or interfaces

// By using polymorphism, you can reduce coupling and increase code reusability

// using abstract classes

abstract class Person
{
    abstract public function greet();
}

// the following classes extend Person, and the greet() method returns different message
class English extends Person
{
	public function greet()
	{
		return 'Hello!';
	}
}

class German extends Person
{
	public function greet()
	{
		return 'Hallo!';
	}
}

class French extends Person
{
	public function greet()
	{
		return 'Bonjour!';
	}
}


function greeting($people)
{
	foreach ($people as $person) {
		echo $person->greet() . '<br>';
	}
}

$people = [
	new English(),
	new German(),
	new French()
];

greeting($people); // Hello, Hallo, Bonjour

// now if we add another class for example American
class American extends Person
{
	public function greet()
	{
		return 'Hi!';
	}
}

// and then add American to $people, it will return Hi

// the following is the same as the above exampl, but it uses interfaces
interface Greeting
{
	public function greet();
}

class English implements Greeting
{
	public function greet()
	{
		return 'Hello!';
	}
}

class German implements Greeting
{
	public function greet()
	{
		return 'Hallo!';
	}
}

class French implements Greeting
{
	public function greet()
	{
		return 'Bonjour!';
	}
}

function greeting($greeters)
{
	foreach ($greeters as $greeter) {
		echo $greeter->greet() . '<br>';
	}
}

$greeters = [
	new English(),
	new German(),
	new French(),
];

greeting($greeters); // Hello, Hallo, Bonjour