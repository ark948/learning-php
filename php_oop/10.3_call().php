<?php



// When you call a method of an object, if the method does not exist or is private, PHP will call the __call() method automatically.

// it accepts two args, $name of the method to call on the object
// $arguments, an array of args to pass to method call

// The __call() method is useful when you want to create a wrapper class that wraps existing API.

// example
// Suppose that you want to develop the Str class that wraps existing string functions such as strlen(), strtoupp() and strtolower().
// Typically, you can define these methods explicitly like length, upper, lower, … 
// Doing so would take time. Instead, you can use utilize the __call() magic method to make the code more concise.


class Str
{
	private $s = '';
	private $functions = [
		'length' => 'strlen',
		'upper' => 'strtoupper',
		'lower' => 'strtolower',
        'substring' => 'substr'
  		// map more method to functions
	];
	public function __construct(string $s)
	{
		$this->s = $s;
	}
	public function __call($method, $args)
	{
		if (!in_array($method, array_keys($this->functions))) {
			throw new BadMethodCallException();
		}
		array_unshift($args, $this->s);
		return call_user_func_array($this->functions[$method], $args);
	}
}


// The $functions property store the mapping between the methods and built-in string functions.
// e.g. if length() is called on a string object, __call() method will call the strlen() function
// if you call for a method that does not exist, php will invoke the __call() method
// then, a BadMethodCallException will be raised if the method is not supported, otherwise it'll add the method to args list before calling it


$s = new Str('Hello, World!');

echo $s->upper() . '<br>'; // HELLO, WORLD!
echo $s->lower() . '<br>'; // hello, world!
echo $s->length() . '<br>'; // 13

$s = new Str('phptutorial.net');
echo $s->substring(0,11); // phptutorial