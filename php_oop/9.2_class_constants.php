<?php

// sometimes we need to define constants that are specific to a class

// to do that, you use the const keyword

class Circle
{
    private const PI = M_PI;
    // default visibility is public
    private $radius;
    const ONE_THIRD = 1/3;
    // constant expression
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function area(): float
    {
        return self::PI * $this->radius ** 2;
    }
}

// you can use the self keyword to reference the constant inside the class

// echo Circle::PI; // since default visibility is public


// Note that you can reference the class using a variable with the value is the class name. 
$className = 'Circle';
// echo $className::PI;

// Since PHP 7.1.0, you can use visibility modifier keywords such as private, protected, and public with the class constant.

// It’s possible to define a class constant using a constant expression. A constant expression is an expression that contains only constants. 


// The following example illustrates how to define a constant in the parent class and override it in the child class
abstract class Model
{
    protected const TABLE_NAME = '';
    public static function all()
    {
        return 'SELECT * FROM ' . static::TABLE_NAME;
    }
}

class User extends Model
{
    protected const TABLE_NAME = 'users';
}

class Role extends Model
{
    protected const TABLE_NAME = 'roles';
}

echo User::all() . '<br>'; // SELECT * FROM users;
echo Role::all() . '<br>'; // SELECT * FROM roles;

