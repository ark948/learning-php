<?php


// in this lesson, we'll learn how to use header() function to redirect web browsers to a different url

// cases that redirection can be used
// Change the domain name of a website to another.
// Replace the URL of a page with another.
// Upgrade the HTTP to HTTPS.

// example
// you have a page with the following URL:
// https://www.phptutorial.net/about.php

// and you want to change it to
// https://www.phptutorial.net/about-us.php

// to do that, use the header() function like this:
header('Location: https://www.phptutorial.net/about-us.php', true, 301);
exit;

// when you navigate to about.php page, php will redirect you to about-us.php

// process:
// browsers asks for about.php
// server receives the request, informs the browser of the new url: about-us.php along with 301
// browser receives the 301 code, and requests the new about-us.php
// server responds with new about-us.php

// syntax
// header(string $header, bool $replace = true, int $response_code = 0): void

// header() needs to be called before any output
// to do that, we'll use the exit() construct

// params:
// $header specifies the HTTP header string to send. In the case of redirection, you use the Location header string for redirection.
// $replace indicates if the header should replace the previous header.
// $response_code is the HTTP status code to send back to the client.


// Use the exit construct immediately after the header() function.