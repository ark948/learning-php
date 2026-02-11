<?php

/**
 * What is XSS?
 * 
 * Cross-site scripting
 * when malicious code is injected into web pages through insecure inputs
 * 
 * attacker's script runs the victim's browser
 * it can steal cookies, hijack sessions, manipulate DOM, or redirect user to dangerous websites
 */

// the solution is to validate and sanitize inputs

// solutions:
htmlspecialchars($_GET['comment'], ENT_QUOTES, 'UTF-8');

// htmlspecialchars() does the following:
// Converts < to &lt;
// Converts > to &gt;
// Converts " to &qout;
// Converts ' to &#039;

// ENT_QUOTES tells htmlspecialchars() to convert double quotes to &qout
// or single quotes to &#039 (or &apos; in XHTML)

