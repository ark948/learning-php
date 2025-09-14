<?php

// to persist information across pages, web server uses sessions
// Sessions allow you to store data on the web server associated with a session id.

// Once you create a session, PHP sends a cookie that contains the session id to the web browser. 

// In the subsequent requests,
//  the web browser sends the session id cookie back to the web server so that PHP can retrieve the data based on the session id.


// to create a new session
session_start();

// When the session_start() runs at the first time, 
// PHP generates a unique session id and passes it to the web browser in the form of a cookie named PHPSESSID.
// if session already exists, php checks the phpsessid cookie sent by browser..
// and session_start() will resume the existing session

// Since PHP sends the PHPSESSID cookie in the header of the HTTP response, 
// you need to call the session_start() function before any statement that outputs the content to the web browser.

// Otherwise, you will get a warning message saying the header cannot be modified because it is already sent.
// This is a well-known error message in PHP.

// PHP stores session data in temporary files on the web server by default.
//  You can find the location of the temporary files using the directive session.save_path in the PHP configuration file.


// The ini_get() function returns the value of the session.save_path directive
echo ini_get('session.save_path');

// or just by calling
echo session_save_path();

// it is usually the tmp folder of the server
// /xampp/tmp

// unlike cookies, any data can be stored in session
// to store data in sesison, set the key and value in $_SESSION superglobal array

// example -> session/index.php


// when browser is closed, php deletes the session,
// sometimes it is required to explicitly delete a sessio, such as logout action
session_destroy();
// this will delete all data associated with current sesison, but will not unset the data in $_SESSION array and cookie

// to completely destroy the session data, you need to unset the varialbe in $_SESSION array and remove the PHPSESSID cookie
session_start();

// remove cookie
if (isset($_COOKIE[session_name()])) { // using session_name() instead of PHPSESSID
    setcookie(session_name(), '', time() - 3600, '/');
}

// unset data in $_SESSION
$_SESSION[] = array();

// destroy the session
session_destroy();

// Notice that we used the session_name() function to get the cookie name instead of using the PHPSESSID. 
// PHP allows you to work with multiple sessions with different names on the same script.