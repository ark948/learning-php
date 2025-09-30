<?php


// PHP invokes the __callStatic() method when you invoke an inaccessible static method of a class.
// The __callStatic() has two parameters: $name and $arguments.


class Str
{
    private static $methods = [
        'upper' => 'strtoupper',
        'lower' => 'strtolower',
        'len' => 'strlen'
    ];
    public static function __callStatic(string $method, array $parameters)
    {
        if (!array_key_exists($method, self::$methods)) {
            throw new Exception('The ' . $method . ' is not supported.');
        }
        return call_user_func_array(self::$methods[$method], $parameters);
    }
}

echo Str::lower('Hello') . '<br>';
echo Str::upper('Hello') . '<br>';
echo Str::len('Hello') . '<br>';

// The Str class a private static property called $methods. 
// It’s an array that holds the mapping of the method name and built-in string functions.

// When you call a static method that doesn’t exist on the Str class, PHP automatically invokes the __callStatic() magic method.

// The __callStatic() checks if the static method name is supported by looking up the keys of the $methods array.
// It’ll throw an Exception if the method is not in the keys of the $methods array. 
// Otherwise, the __callStatic() method will call the corresponding string function.