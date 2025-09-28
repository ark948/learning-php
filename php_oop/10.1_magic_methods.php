<?php


// magic methods are special methods in a class
// they override default actions when an object performs

// by convention they start with double underscore

// constructor and desctructor are examples of it

// constructor is invoked automatically when object is created
// and destructor is invoked when object is deleted

// there are many other magic methods
/*

Magic Method	Description
__call()	is triggered when invoking an inaccessible instance method
__callStatic()	is triggered when invoking an inaccessible static method
__get()	is invoked when reading the value from a non-existing or inaccessible property
__set()	is invoked when writing a value to a non-existing or inaccessible property
__isset()	is triggered by calling isset() or empty() on a non-existing or inaccessible property
__unset()	is invoked when unset() is used on a non-existing or inaccessible property.
__sleep()	The __sleep() commits the pending data
__wakeup()	is invoked when the unserialize() runs to reconstruct any resource that an object may have.
__serialize() The serialize() calls __serialize(), if available, and construct and return an associative array of key/value pairs that represent the serialized form of the object.
__unserialize()	The unserialize() calls __unserialize(), if avaialble, and restore the properties of the object from the array returned by the __unserialize() method.
__toString()	is invoked when an object of a class is treated as a string.
__invoke()	is invoked when an object is called as a function
__set_state()	is called for a class exported by var_export()
__clone()	is called once the cloning is complete
__debugInfo()	is called by var_dump() when dumping an object to get the properties that should be shown.
*/

// When you attempt to write to a non-existing or inaccessible property,
// PHP calls the __set() method automatically. The following shows the syntax of the __set() method

// public __set ( string $name , mixed $value ) : void

// The __set() method accepts the name and value of the property that you write to. The following example illustrates how to use the __set() method

class HtmlElement
{
	private $attributes = [];
	private $tag;
	public function __construct($tag)
	{
		$this->tag = $tag;
	}
	public function __set($name, $value)
	{
		$this->attributes[$name] = $value;
	}
	public function __get($name)
	{
		if (array_key_exists($name, $this->attributes)) {
			return $this->attributes[$name];
		}
	}

	public function html($innerHTML = '')
	{
		$html = "<{$this->tag}";
		foreach ($this->attributes as $key => $value) {
			$html .= ' ' . $key . '="' . $value . '"';
		}
		$html .= '>';
		$html .= $innerHTML;
		$html .= "</$this->tag>";
		return $html;
	}
}

// The following uses the HTMLElement class and create a new div element:
$div = new HtmlElement('div');

$div->id = 'page';
$div->class = 'light';

echo $div->html('Hello'); // <div id="page" class="light">Hello</div>


// The following code attempts to write to the non-existing property:
$div->id = 'page';
$div->class = 'light';
// PHP calls the __set() method implictily and adds these properties to the $attribute property.


// php __get() method
// when you attempt to access a property that does not exist, or is in-accessible such as private or protected
// php automatically calls this method

// added the __get method to HtmlElement

// The following creates a new article element, sets the id and class attributes, and then shows the value of these attributes
$article = new HtmlElement('article');

$article->id = 'main';
$article->class = 'light';

// show the attributes
echo $article->class . '<br>'; // light
echo $article->id . '<br>'; // main