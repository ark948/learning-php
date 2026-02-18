<?php

/**
 * What is SQL injection?
 * 
 * A web security vulnerability where an attacker injects malicious SQL code into your query input fields.
 * Never trust user input
 */

//  example of vulnerable code
$name = $_POST['name'];
$password = $_POST['password'];
$stmt = $pdo->query("SELECT * FROM users WHERE name='$name' AND password='$password'");
// Using input values directly in SQL statements, DANGEROUS
// try entering this exact text as password (with any username): anything' or 'x'='x

// in SQL, password='anything' is false (since the real password is different)
// but, 'x'='x' is always true because 'x' = 'x' is a true condition
// so the WHERE clause becomes:
// WHERE name='admin' AND true

// so the query returns the admin row, and attacker can login without knowing the real password

// use prepared statements with bound parameters
// :name and :password are treated as values not SQL code
// PDO sends the sql structure separately from the user input
