<?php

session_start();

require_once __DIR__ . '/inc/functions.php';

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
 
if ($request_method === 'POST') {
    require_once __DIR__ . '/inc/post.php';
} elseif ($request_method === 'GET') {
    require_once __DIR__ . '/inc/get.php';
} 


require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/form.php';
require_once __DIR__ . '/inc/footer.php';