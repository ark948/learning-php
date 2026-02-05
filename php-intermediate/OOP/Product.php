<?php


/**
 * Traits: mechanisms for reusing code without inheritance
 * 
 * They allow to reuse methods across multiple classes without using inheritance
 * (since php does not support multiple inheritance)
 * 
 * since php 8.2, Traits can have properties, but adding constructor is not advised
 */

trait MyTrait {
    public $name;
    public function DataCreation() {
        return "data is created. ";
    }
    
    public function DataUpdating($name) {
        return "$name is updated. ";
    }
}


class Product {
    use MyTrait;
    // now we have access to MyTrait methods and properties
    // we can use more than trait
}


$product = new Product;
echo $product->DataCreation();
echo $product->DataUpdating("Product A");

$product->name = "Product 0";
echo $product->name;