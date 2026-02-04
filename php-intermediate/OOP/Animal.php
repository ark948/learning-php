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
    public function speak($sound) {
        return ' ' . $this->name . ' ' . $sound;
    }
}


class Dog extends Animal {

}

$dog = new Dog;
$dog->name = "Bobby";
echo $dog->name;
echo $dog->speak("bark.");