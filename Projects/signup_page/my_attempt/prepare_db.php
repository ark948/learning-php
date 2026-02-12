<?php


$pdo = require_once 'connect.php';


// Create database
// User must have sufficient permissions to be able to create a database
$sql = "CREATE DATABASE signup_project_db";
try {
    $pdo->exec($sql);
    // on success, exec() returns the number of rows effected
    // IMPORTANT Exception: CREATE statements do not affect rows even if successful so 0 is returned
    // in such scenarios, if no exception has occurred, we assume success
    echo "Database created successfully";
} catch (PDOException $e) {
    echo "Error in creating db: " . $e->getMessage();
}


// Create table
$statement = 'CREATE TABLE IF NOT EXISTS users( 
    user_id   INT AUTO_INCREMENT,
    username  VARCHAR(100) NOT NULL,
    password_hash VARCHAR(256) NOT NULL,
    PRIMARY KEY(user_id)
)';

$response = $pdo->exec($statement);
if ($response) {
    echo "success"; // IMPORTANT, 0 is returned since no row is affected
}