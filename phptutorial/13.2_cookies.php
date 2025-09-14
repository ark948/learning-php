<?php


// web works based on http protocol.
// http protocol is stateless, it does not keep information
// a request is made to a server, server responds. later if the same browser sends another request,
// web server has no information that the request is from the same browser.
// cookies solve this challenge.


// a cookie is a piece of data webserver sends to browser
// browser may store it and sent it back in subsequent requests

// when a browser sends a request to web server,
// web server will create the cookie using setcookie() and attaches the cookie to http response header
// the browser stores the cookie
// and attaches the subsequent requests with that cookie in header
// php can access cookies using the $_COOKIE superglobal

// common maximum size for a cookie in browsers is 4 KB, but this varies between browsers

// cookies have expiration date

// A cookie also stores the web address (URL) that indicates the URL that created the cookie. 
// The web browser can send back the cookie that was originally set by the same URL.
// In other words, a website won’t be able to read a cookie set by other websites.


// IMPORTANT
// Most modern web browsers allow users to choose to accept cookies.
// Therefore, you should not wholly rely on cookies for storing critical data.


// why use cookies:
// session management, cookies allow websites to remember users, their login info, or anything else that should be remembered
// personalization, cookies can store user's preferences, themes, and other...
// Tracking: cookies store user behavior. 
// e.g. on an E-commerce website, you can use cookies to record the products that users previously viewed.
// Later, you can use this information to recommend the related products that users might be interested in.


// to create cookies
// setcookie ( 
//     string $name,
//     string $value = "" , 
//     int $expires = 0 , 
//     string $path = "" , 
//     string $domain = "" , 
//     bool $secure = false , 
//     bool $httponly = false 
// ): bool


// if expires is not set, or is set to 0, cookie will expire when browser closes
// path, the path on web server on which the cookie will be avaialble
// domain on which the cookie will be available
// if $httponly is true, the cookie can be accessed only via the HTTP protocol, not JavaScript.

// php 7.3 added an alternative signature for creating cookies
// setcookie ( 
//     string $name , 
//     string $value = "" , 
//     array $options = [] ) : bool

// The $options argument is an array that has one or more keys, such as expires, path, domain, secure, httponly and samesite.
// The samesite can take a value of None, Lax, or Strict. If you use any other key, the setcookie() function will raise a warning.

// The setcookie() function returns true if it successfully executes. 
// Notice that it doesn’t indicate whether the web browser accepts the cookie. The setcookie() function returns false if it fails.

// $_COOKIE is an associative array
// to access a cookie
$_COOKIE['cookie_name'];

// IMPORTANT
// If the cookie name contains dots (.) and spaces (' '), you need to replace them with underscores (_).

// use the isset() to check if a cookie is set
if(isset($_COOKIE['cookie_name'])) {
    echo 'cookie is set';
}

// always check if a cookie exists before reading it

// to check if a cookie equals a value
if (isset($_COOKIE['cookie_name']) && $_COOKIE['cookie_name'] == 'value') {
	echo 'something...';
}


// to delete a cookie, we use the setcookie to set the expiration date to the past
unset($_COOKIE['cookie_name']);
setcookie('cookie_name', null, time()-3600);

// The following example shows how to use a cookie to display a greeting message to a new or returning visitor.

define('ONE_WEEK', 7 * 86400); // a constant that stores one week in seconds
$returning_visitor = false;
if (!isset($_COOKIE['return'])) { // if tthe cookie is not set, create one
    setcookie('return', '1', time() + ONE_WEEK);
} else { // otherwise set the returning_visitor to true, so we know that it is a subsequent request (user has visited before)
    $returning_visitor = true;
}

echo $returning_visitor ? "Welcome back" : "Welcome to my website";

// if you open this page on browser,
// for the first time it will display Welcome to my site.
// then a cookie will be set, which you can check in devtools
// then, if you check the website again, it will say Welcome back.
// cookie will last for one week, can be deleted manually