<?php

require "Apple.php";
require "LG.php";

// this is another and better format
use Apple\CreateNewPhone As CreateNewApplePhone;
use LG\CreateNewPhone As CreateNewLGPhone;
// since both classes have the same name, we have to use alias

$obj1 = new CreateNewApplePhone();
$obj2 = new CreateNewLGPhone();

$obj1->turnOnPhone();
$obj2->turnOnPhone();