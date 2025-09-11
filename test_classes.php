<?php

class ParentClass {
    public $publicProperty = "I am public.";
    protected $protectedProperty = "I am protected.";
    private $privateProperty = "I am private.";

    public function getPrivateProperty() {
        return $this->privateProperty;
    }
}

class ChildClass extends ParentClass {
    public function accessParentProperties() {
        echo $this->publicProperty . "\n"; // Accessing public property
        echo $this->protectedProperty . "\n"; // Accessing protected property
        echo $this->getPrivateProperty() . "\n"; // Accessing private property via parent's public method
    }
}

$child = new ChildClass();
$child->accessParentProperties();

// IMPORTANT

// -> (arrow operator) used to access static class members (properties, methods, constants)
// :: (scope resolution protocol) used to access object member or instance members