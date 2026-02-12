<?php

// Disabling errors in production

/**
 * Why hide errors in production?
 * 
 * An errors occurs, php can show detailed error messages. this is useful in development stage.
 * but in production, this is dangerous. it can reveal info that attackers can use to craft targeted attacks.
 * - file paths (/var/www.html/app/config.php)
 * - sql queries or db names
 * - server config details
 * - php version or framework used
 */

// example
$conn = mysqli_connect("localhost", "root", "", "shop");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// if database is down, this might show:
    // Connection failed, Access denied for user 'root'@'localhost'
    // Reveals, username, db server, that you're using MySQL (valuable info for attackers)

// Hide errors from output
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

// Log errors instead
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/errors.log');


// some people edit php.ini or htaccess