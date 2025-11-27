<?php


// we'll use password_hash() function to create password hashes

// The password_hash() function allows you to create a password hash using a secure one-way hashing algorithm.
// password_hash( string $password, string|int|null $algo, array $options = [] ): string

// $algo is the constant that specifies the hashing algorithm
// $optons is an associative array of optons of each algorithm, if omitted, a random salt will be generated and default cost for hashing

// it returns the hashed password

// the following hashing algorithms are supported
// PASSWORD_DEFAULT	bcrypt
// PASSWORD_BCRYPT	CRYPT_BLOWFISH 
// PASSWORD_ARGON2I	Argon2i
// PASSWORD_ARGON2ID	Argon2id

// example
$password = 'Password1';
echo password_hash($password, PASSWORD_DEFAULT);
// output: $2y$10$hnQY9vdyZUcwzg2CO7ykf.a4iI5ij4Pi5ZwySwplFJM7AKUNUVssO

// Besides hashing a plain text password, you can use the password_hash() to securely hash any token you want to store in the database.