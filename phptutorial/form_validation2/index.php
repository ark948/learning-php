<?php


session_start();

require 'inc/header.php';

require 'inc/functions.php';

$pizza_toppings = [
    'pepperoni' => 0.5,
	'mushrooms' => 1,
	'onions' => 1.5,
	'sausage' => 2.5,
	'bacon' => 1.0,
];

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
    require 'inc/get.php';
} elseif ($request_method === 'POST') {
    require 'inc/post.php';
}

require 'inc/footer.php';