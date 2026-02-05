<?php


/**
 * Static properties and methods: they belong to the class itself not any instance of it
 * 
 * They can be used by calling the class directly.
 * self keyword is used to refer to static properties and methods and class itself
 * :: scope resolution operator can be used outside the class body to access static properties and methods
 */


/**
 * Class Constants: static properties that their value cannot be changed (public by default)
 * 
 * defined using the keyword const + no $ sign
 * must be assigned an expression/value right away not a variable or function result
 * cannot be changed after declaration
 * accessible via ::
 * can be inherited and overridden in child classes
 */


//  self cannot be used outside class body


class User {
    public static $name;
    public const string ROLE = "user"; // public and string are not required
    public static function printInfo($age) {
        return " user " . self::$name . " is $age years old ";
    }
}


User::$name = "Nick Barns";
echo User::printInfo(22);

echo User::ROLE;

// User::ROLE = "admin"; // Error