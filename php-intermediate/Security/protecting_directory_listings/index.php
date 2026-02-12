<?php


// Disabling directory listings with .htaccess

/**
 * What is Directory Listing?
 * 
 * when a web server (like Apache) has no default file (index.php, index.html, etc.) in a folder, it may list all files in that directory.
 * 
 * example (if directory listing is enabled):
 * http://localhost/uploads/
 * this might show Index of /uploads
 * 
 * it's dangerous because:
 * attackers can see sensitive files (config.php, .env, backups),
 * they can download secure code or data,
 * it gives them a map of your site's structure
 */

// we could prevent access to directory Listing with a .htaccess file (in Apache)
// add Options -Indexes to .htaccess file (put this file in main directory of project?)
// now if you try to access http://localhost/uploads/ you'll get Forbidden error
// you can add an optional message as well (instead of Forbidden error)

