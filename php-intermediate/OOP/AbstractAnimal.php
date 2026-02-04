<?php

// Abstract method must be implemented fully in child class to work

abstract class AbstractAnimal {
    public $fullName;
    abstract public function makeSound($name);
    public function canPlay() {
        return " my pet can play. ";
    }
}

// $obj = new AbstractAnimal; // Cannot instantiate abstract class

class Dog extends AbstractAnimal {
    public function makeSound($name) {
        // Number of params must be as exactly the same as in abstract method
        return $this->fullName . " barking. ";
    }
}


// Example of Polymorphism (notice makeSound method)
// Dog makeSound will bark
// Cat makeSound will meow
class Cat extends AbstractAnimal {
    public function makeSound($name) {
        return $name . " is meowing. ";
    }
}

$dog = new Dog;
echo $dog->makeSound("dog");
echo $dog->canPlay();

$cat = new Cat;
echo $cat->makeSound("cat");