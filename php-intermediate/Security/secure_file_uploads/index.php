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
    /**
     * How does PHP detects the true MIME of the uploaded file?
     * It reads a specific pattern of bytes (may be referred to as Magic Byte) at the beginning of a file. (it's the file's internal signature or fingerprint)
     * (it is embedded in the file's binary data)
     * and matches it against a database of known signatures to identify the true type of data (MIME). (This is according to ChatGPT, modified for brevity by me)
     * 
     */


// 3. Limiting file size


// 4. Renaming uploaded files
// a. to prevent collision
// b. to make it harder to guess file names (security through obsecurity or STO)
