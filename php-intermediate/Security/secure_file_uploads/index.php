<?php

/**
 * Risks of allowing users to upload files (still it is a required feature almost always)
 * 
 * 1. attacker uploads malicious php or shell script and runs it
 * 2. attacker could upload a huge file and cause denial of servie attack
 * 3. they might trick your site into serving infected files to other uesrs.
 * 
 * Therefore, Uploading files must be strictly controlled.
 */


// best practices

// 1. Restrict allowed file types
// only safe files (jpeg, jpg, png, gif)


// 2. Validate the MIME type
// attackers can change evil.php to nice.jpg
// you must check the real content type

