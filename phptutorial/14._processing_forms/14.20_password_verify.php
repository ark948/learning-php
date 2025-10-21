<?php


// To verify if a plain text password matches a hashed password,
// you must hash the plain text password and compare the hashes.

// password_verify() does that automatically

// example
$hash = '$2y$10$hnQY9vdyZUcwzg2CO7ykf.a4iI5ij4Pi5ZwySwplFJM7AKUNUVssO';
$valid = password_verify('Password1', $hash);

// first param -> plain text password
// second param -> hashed password

echo $valid ? 'Valid' : 'Not valid'; // Valid


// an example of allowing a user in based on password they have provided

// $user = find_user_by_username($username);
$user = 'somedude'; // you will need to find the user from the database using either email or username or...

if ($user && password_verify($password, $user['password'])) {
    // log the user in
    session_regenerate_id();
    $_SESSION['user_id'] = $user['id'];
} else {
    echo 'Invalid username or password';
}