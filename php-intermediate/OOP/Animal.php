<?php

/**
 * Inheritance: Allows classes to inherit properties and method from another classes
 * 
 * benefits:
 * Reusability: use parent code without repeating
 * Extensibility: by overriding features in child class
 */

/**
 * protected property: can be accessed within the class that defines and classes that inherit from it
 * but not outside of them
 */

class Animal {
    public $name;
    protected $age;
    public function __construct($name) {
        $this->name = $name;
        echo " Parent constructor ";
    }

    public function speak($sound) {
        return ' ' . $this->name . ' ' . $sound;
    }

    public function walk() {
        return " can walk ";
    }

    final public function greet() {
        // add final keyword to prevent overriding
        return " this cannot be overridden ";
    }

    public function setAge($age) {
        $this->age = $age;
        return $this->age;
    }

    protected function canHunt() {
        return $this->name . " can hunt ";
    }

    public function isHunter() {
        return $this->canHunt();
    }
}


class Dog extends Animal {
    public $breed;
    public function __construct($name, $breed) {
        // this will override parent's constructor
        // PARENT constructor can also be explicitly called (must come before anything else)
        parent::__construct($name);
        $this->breed = $breed;
        echo " Child constructor ";
    }
    
    public function speak($sound) {
        // will override speak from parent, BUT number of params must be equal or more
        return "Fluffy is a Dog";
    }

    public function walk() {
        // overriding
        return parent::walk() . " and bark. ";
    }

    // public function greet() {
        // Cannot override final method Animal::greet()
    // }
}


// $dog->age = 5; // error
// echo $dog->age; // error
$dog = new Dog("Bobby", "Husky"); // both constructors will be triggered
echo $dog->walk();

echo $dog->setAge(7);
// echo $dog->canHunt(); // Fatal error: Uncaught Error: Call to protected method Animal::canHunt() from global scope

echo "<br>";

echo $dog->isHunter();