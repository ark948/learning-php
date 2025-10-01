<?php


require 'scr/Model/Customer.php';
require 'src/Model/Product.php';
require 'src/Utils/Logger.php';
require 'src/Database/Logger.php';



// use Store\Model;
use Store\Model\{Customer, Product};

use Store\Utils\Logger;
use Store\Database\Logger as DatabaseLogger;

// $customer = new Customer('Bob');
// echo $customer->getName();
// Fatal error, class Customer not found in ...

// $customer = new Store\Model\Customer('Bob');
// echo $customer->getName();

$customer = new Customer('Bob');
echo $customer->getName();

$product = new Product();

$loggers = [
    new Logger(),
    new DatabaseLogger()
];

