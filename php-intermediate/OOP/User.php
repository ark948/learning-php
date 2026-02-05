<?php


/**
 * Static properties and methods: they belong to the class itself not any instance of it
 * 
 * They can be used by calling the class directly.
 * self keyword is used to refer to static properties and methods and class itself
 * :: scope resolution operator can be used outside the class body to access static properties and methods
 */


//  self cannot be used outside class body


class User {
    public static $name;
    public static function printInfo($age) {
        return " user " . self::$name . " is $age years old ";
    }
}


User::$name = "Nick Barns";

echo User::printInfo(22);