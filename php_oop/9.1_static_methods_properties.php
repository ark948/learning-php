<?php



// regular methods and properties can be called ans accessed from instances of objects
// therefore they are called instance methods and properties

// using static keyword we can access methods and properties from the class itself

// static methods are bound to class not any object of class

// $this is not available inside staic methods, instead there is a self variable which means the current class

class MyClass
{
    public static $staticProperty;
	public static function staticMethod()
	{
	}
}

// and to call a static method from inside of the class:
// self::staticMethod(arguments);

// to call a static method from outside of the class:
MyClass::staticMethod();


// The following example defines the HttpRequest class that has a static method uri() that returns the URI of the current HTTP request
class HttpRequest
{
	public static function uri(): string
	{
		return strtolower($_SERVER['REQUEST_URI']);
	}
}

echo HttpRequest::uri();

// to define a static property use also use the static keyword
// public static $staticProperty


// MyClass::$staticProperty;

// Like the static methods, to access static properties from within the class, you use the self instead of  $this as follows:
// self::$staticProperty


// Suppose that you want to create an App class for your web application. 
// And the App class should have one and only one instance during the lifecycle of the application. 
// In other words, the App should be a singleton

class App
{
	private static $app = null;
	private function __construct()
	{
	}

	public static function get() : App
	{
		if (!self::$app) {
			self::$app = new App();
		}

		return self::$app;
	}

	public function bootstrap(): void
	{
		echo 'App is bootstrapping...';
	}
}

// First, define a static property called $app and initialize its value to null:

// private static $app = null;

// Second, make the constructor private so that the class cannot be instantiated from the outside:

// The get() method creates an instance of the App if it has not been created, otherwise, it just simply returns the App’s instance.
// Notice that the get() method uses the self to access the $app static property.


// how to use App class?
$app = App::get();
$app->bootstrap();

