<?php

// to compare objects, you can use comparison operator == or identity operator ===
// they behave differently based on two main criteria
// Objects are the same instance or different instances of a class
// Object’s properties and their values.

// example
class Point
{
	private $x;
	private $y;
	public function __construct($x, $y)
	{
		$this->x = $x;
		$this->y = $y;
	}
}


// when using comparison operator ==
// two objects are equal if they are instances of the same class and have the same properties and values
$p1 = new Point(10, 20);
$p2 = new Point(10, 20);

if ($p1 == $p2) {
	echo 'p1 and p2 are equal.';
} else {
	echo 'p1 and p2 are not equal.';
}

// p1 and p2 are equal
// if you create a new object, with different properties' values, and compare them, they will not be equal

// when using the identity operator, objects are identical if both of them reference the same instance of class
$p1 = new Point(10, 20);
$p2 = $p1;

if ($p1 === $p2) {
	echo 'p1 and p2 are identical.';
} else {
	echo 'p1 and p2 are not identical.';
}
// p1 and p2 are identical

$p3 = new Point(10, 20);
if ($p1 === $p3) {
	echo 'p1 and p3 are identical.';
} else {
	echo 'p1 and p3 are not identical.';
}
// p1 and p3 are not identical (even though their properties' values are the equal)

// comparison table of == and ===
// Criteria	                                ==	    ===
// Two objects reference the same instance	true	true
// Objects with matching properties	true	false
// Objects with different properties	    false	false