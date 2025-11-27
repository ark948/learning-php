<?php



// introduced in php 5.3
// a new magic constant called __DIR__

// When you reference the __DIR__ inside a file, it returns the directory of the file. 
// The __DIR__ doesn’t include a trailing slash, e.g., / or \ except it’s a root directory

// When you use the __DIR__ inside an include, the __DIR__ returns the directory of the included file.

// Technically speaking, the __DIR__ is equivalent to the dirname(__FILE__). 
// However, using the __DIR__ is more concise than the dirname(__FILE__).

// always use __DIR__ to include a file (require)