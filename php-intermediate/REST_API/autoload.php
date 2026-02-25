<?php

// autoloader

spl_autoload_register(callback: function($class): void {
    // define namespace prefix
    $prefix = "App\\";

    // define dir
    $dir = __DIR__ . "/src/";

    // length of namespace prefix
    $len = strlen(string: $prefix);

    // strncmp() will compare the characters to the given length, 0 for equal, any negative number means string1 is less than string2
    // anything above 0 means string1 is greater than string2
    if (strncmp(string1: $prefix, string2: $class, length: $len) !== 0) {
        // we're checking if the $prefix and $class have the same beginning (App\)
        // if they do not match (result will not be 0), we terminate by returning nothing
        return;
    }

    // substr to get the file
    // example: App\Core\Database
    // Core\Database will be relative
    $relative_class = substr($class, $len);

    // file
    $file = $dir . str_replace("\\", "/", $relative_class) . ".php"; // app/file.php
    // example: Core/Database.php

    if (file_exists(filename: $file)) {
        require $file;
    }
});


// Database class should be loaded

use App\Core\Database;
Database::connect();