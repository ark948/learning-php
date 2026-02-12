<?php


// Never store passwords in plain text
// if database is leaked, hacked or exposed, all user accounts are instantly compromised.

// hashing -> is a one-way encryption

// a password is ran through a hashing algorithm and the resulting hash can be stored.

// when users attempt to log in, we hash the entered password as well and compare it with the hash in database

// if they are both the same, we let the user in

// php (since 5.5) has some helper functions that will automatically take care of hashing and verifying
// password_hash() and password_verify()



// extra best practices

// use prepared statements to avoid sql injection
// rete-limit login attempts (prevents brute force)
// enforce strong passwords (legnth & complexity)
// use https so passwords are not sent in plain text