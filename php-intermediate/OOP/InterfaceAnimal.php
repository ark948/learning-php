<?php


interface AnimalInterface {
    // public $name = "Badger"; // Error, interface may not include properties
    public function makeSound();
}


class Dog implements AnimalInterface {
    public function makeSound() {
        return " my dog barks. ";
    }
}


class Cat implements AnimalInterface {
    public function makeSound() {
        return " my cat meows. ";
    }
}


$dog = new Dog;
echo $dog->makeSound();

$cat = new Cat;
echo $cat->makeSound();