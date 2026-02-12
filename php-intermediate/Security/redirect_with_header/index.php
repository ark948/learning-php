<?php


// redirecting with header the right way

/**
 * When header("Location: dashboard.php"); is called...
 * PHP sends a HTTP redirect response to the browser.
 * (the browser is told to load another page)
 * But PHP does not stop executing the script at this pont.
 * any code after the header() will still run.
 * 
 * If you don't use exit;, the rest of your script continues to run, and potentially leak some data.
 * sensitive operations may run even though user is being redirected.
 * unwanted output might get sent, breaking headers or exposing data.
 * security bypasses: an attacker could trigger redirects but still force your script to execute hidden logic, using burp suite, postman, or curl etc.
 * 
 */


// Always terminate script right after execution

// header("Location: redirect.php");
// exit; // or die();

// example
$role = "writer";
if ($role == "writer"):
    header("Location: redirect.php");
    exit;
endif;

echo "admin logic here"; // this could be exposed