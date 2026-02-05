<?php


interface AnimalInterface {
    // public $name = "Badger"; // Error, interface may not include properties
    public function makeSound();
}


interface CanRunInterface {
    public function isRunning();
}


class Dog implements AnimalInterface, CanRunInterface {
    // class Dog implements multiple interfaces
    public function makeSound() {
        echo " my dog barks. ";
    }

    public function isRunning() {
        return " dog can run. ";
    }
}


class Cat implements AnimalInterface {
    public function makeSound() {
        return " my cat meows. ";
    }
}


// a polymorphic function
function triggerSound(AnimalInterface $animal) {
    // type hinting
    $animal->makeSound();
}

function triggerCanRun(CanRunInterface $runner) {
    $runner->isRunning();
}


// $dog = new Dog;
// echo $dog->makeSound();
// echo $dog->isRunning();

// $cat = new Cat;
// echo $cat->makeSound();

triggerSound(new Dog);
triggerCanRun(new Dog);