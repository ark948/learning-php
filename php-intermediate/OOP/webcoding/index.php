<?php


// Namespaces can have namespaces (sub-namespaces)


require "Apple.php";
require "LG.php";
// error, cannot declare CreateNewPhone, it already exists
// after adding namespaces for both of them in their own file, the error is gone

$obj = new Apple\CreateNewPhone();
print_r($obj);
$obj->turnOnPhone();


$obj2 = new LG\CreateNewPhone();
print_r($obj2);
$obj2->turnOnPhone();