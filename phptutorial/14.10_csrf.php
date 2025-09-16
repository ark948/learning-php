<?php


// CSRF stands for cross site request forgery

// an attack that tricks the victim into submitting a malicious request.

// to prevent it, a token should be created,
// that token will be checked by server upon submission of the request
// if it does not match, server can notice and will not perform any wrong action

// first we need to create a token using random numbers
$_SESSION['token'] = md5(uniqid(mt_rand(), true));

// then we create a hidden input element and set this token as its value attribute

// when form is submitted, we check if the token exists in the INPUT_POST and compare it with the one in session

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
if (!$token || $token !== $_SESSION['token']) { // if token does not exist, or does not equal to the one in session
    // return 405 http status code
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method not allowed.');
    exit; // terminate the script
} else {
    // other than that, continue with processing the form
}

// for the complete example go to csrf_form folder