<?php

// If the request method is GET, the index.php file loads the form in the get.php file. 
// Otherwise, it loads the code from the post.php file for processing the POST request.
// The .htaccess file prevents direct access to the files in the inc directory. It’s relevant only to the Apache webserver.
// By using the .htaccess file, you cannot browse the file directly from the inc folder.

require __DIR__ . '/inc/header.php';

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    require __DIR__ . '/inc/get.php';
} elseif ($request_method === 'POST') {
    require __DIR__ . '/inc/post.php';
}

require __DIR__ . '/inc/footer.php';