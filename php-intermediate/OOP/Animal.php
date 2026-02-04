<?php

/**
 * Inheritance: Allows classes to inherit properties and method from another classes
 * 
 * benefits:
 * Reusability: use parent code without repeating
 * Extensibility: by overriding features in child class
 */

class Animal {
    public $name;
    public function __construct($name) {
        $this->name = $name;
        echo " Parent constructor ";
    }

    public function speak($sound) {
        return ' ' . $this->name . ' ' . $sound;
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
}


$dog = new Dog("Bobby", "Husky"); // both constructors will be triggered