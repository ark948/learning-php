<?php



session_start();

require __DIR__ . '/inc/header.php';

$errors = [];
$inputs = [];

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
    // generate a token
    $_SESSION['token'] = bin2hex(random_bytes(35));
    // random_bytes generates a random string with 35 characters
    // bin2hex returns the hexadecimal representation of the random string
    
    // show the form
    require __DIR__ . '/inc/get.php';
} elseif ($request_method === 'POST') {
    // handle the form submission
    require __DIR__ . '/inc/post.php';

    // re-display the form if it contains errors
    if ($errors) {
        require __DIR__ . '/inc/get.php';
    }
}

require __DIR__ . '/inc/footer.php';