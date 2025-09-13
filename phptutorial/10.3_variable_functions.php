<?php


// Variable functions allow you to use a variable like a function. 
// When you append parentheses () to a variable, PHP will look for the function whose name is the same as the variable’s value and execute it.
$f = 'strlen';
echo $f('Hello');

// If PHP cannot find the function name, it’ll raise a fatal error

// The variable functions allow you to call the methods of an object.
// The syntax for calling a method using a variable function is as follows
class Str
{
	private $s;
	public function __construct(string $s)
	{
		$this->s = $s;
	}

	public function lower()
	{
		return mb_strtolower($this->s, 'UTF-8');
	}

	public function upper()
	{
		return mb_strtoupper($this->s, 'UTF-8');
	}

	public function title()
	{
		return mb_convert_case($this->s, MB_CASE_TITLE, 'UTF-8');
	}

	public function convert(string $format)
	{
		if (!in_array($format, ['lower', 'upper', 'title'])) {
			throw new Exception('The format is not supported.');
		}
		return $this->$format();
	}
}

// First, define a Str class that has three methods for converting a string to lowercase, uppercase, and title case.
// Second, define the convert() method that accepts a string. 
// If the format argument is not one of the method names: lower, upper, and title, the convert() method will raise an exception. 
// Otherwise, it’ll call the corresponding method lower(), upper() or title().

// The following shows how to use the convert() method of the Str class:
$str = new Str('Hello there');
echo $str->convert('title');
// Output: Hello There

// The following example uses a variable function to call a static method:
class Str2
{
	private $s;

	public function __construct(string $s)
	{
		$this->s = $s;
	}

	public function __toString()
	{
		return $this->s;
	}

	public static function compare(Str2 $s1, Str2 $s2)
	{
		return strcmp($s1, $s2);
	}
}

$str1 = new Str2('Hi');
$str2 = new Str2('Hi');

$action = 'compare';

echo Str2::$action($str1, $str2); // 0



