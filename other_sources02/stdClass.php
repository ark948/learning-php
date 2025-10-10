<?php


// stdClass is a feature provided by PHP to create a regular class.
// it is predefined empty class used as utility to create other objects

// In the following example, stdClass is used instead of an array to store details:
$obj = new stdClass();
$obj->name = 'Some_Name';
$obj->extension = 'something';
var_dump($obj);

// example of converting an array to an object by typecasting
$obj = array(
    'name'=>'SomeName',
    'extension'=>'some_extension'
);

$obj = (object) $obj;
var_dump($obj); // this still is gonna be stdClass

// If an object is converted to an object using stdClass, it is not modified.
