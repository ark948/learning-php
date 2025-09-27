<?php


// introduced in php 5.3

class Model
{
	protected static $tableName = 'Model';
	public static function getTableName()
	{
		// return self::$tableName;
        return static::$tableName;
	}
}

class User extends Model
{
	protected static $tableName = 'User';
}

// echo User::getTableName(); // Model

// call the getTableName() method of the User class. However, it returns Model instead of User.
// The reason is that self is resolved to the class in which the method belongs.
// If you define a method in a parent class and call it from a subclass, it self does not reference the subclass as you might expect.

// instead of using self, use static keyword to reference the exact class that is called at runtime


echo User::getTableName(); // User