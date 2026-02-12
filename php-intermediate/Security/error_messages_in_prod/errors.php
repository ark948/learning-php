<?php

// Hide errors from output
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

// Log errors instead
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/errors.log');

$var = "sample user";
echo $anotherVar; // a variable that does not exist to trigger an error