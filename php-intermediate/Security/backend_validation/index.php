<?php


/**
 * Validation: process of checking if data coming to server from user is correct, safe, and expected.
 * 
 * Frontend validation (javascript) is not enough.
 * 
 * Risks of frontend validation only:
 * 1. javascript validation can be bypassed
 *      tools like curl, postman, or browser dev can be used to send malicious code to your php script
 *      even if you block script tag in javascript, hackers can still send them directly to your backend causing xss
 * 2. false trust in client side code
 *      js code runs on user's machine, it can be disabled, editted, or faked.
 * 3. security vulnerabilities remain open
 *      without backend validation, attackers can try sql injection, file upload attacks, or path traversal.
 * 
 * Benefits of backend validation:
 * 1. Data integrity
 * 2. Security enforcement
 * 3. Consistency
 * 4. Defense in depth (if frontend validation is bypassed, backend validation can catch bad data before damage)
 */