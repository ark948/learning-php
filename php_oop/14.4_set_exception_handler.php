<?php


// it may be difficult to catch every possible exception manully
// a better solution is to register a global exception handler

// global exception handler will allow us to show user-friendly message to users while logging the important info to a log file for later

// to register a global exception handler use set_exception_handler function
// it accepts a callback


set_exception_handler(function ($ex) {
    // handle exceptions
});

// or pass its name to it
set_exception_handler('handle_exceptions');

// it is possible to use a method of an object
// to do so, pass an array, first element is the object, second element is the method name

class ExceptionHandler
{
	public function handle(Exception $ex)
	{
		// code to handle the exception
	}
}
$handler = new ExceptionHandler();
set_exception_handler([$handler, 'handle']);
// IMPORTANT
// method of object MUST be public to be used as handler


// an static method can also be used
class ExceptionHandler
{
	public static function handle(Exception $ex)
	{
		// code to handle the exception
		// ...
	}
}
set_exception_handler(['ExceptionHandler', 'handle']);

// for the rest of this lesson refer to php_oop/exception_handling folder