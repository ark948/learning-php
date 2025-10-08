<?php


require './app/bootstrap.php';

$user = new User('admin', 'secure-password');

// for small projects, using require_once is ok
// when project gets more complicated, you can use spl_autoload_register
// but there is a problem with spl_autoload_register
// we need to define autoloaders ourselves
// and other developmers may not like it
// and we have to study autoloaders of other developers in other codebases

// this is where composer comes into play

// Composer is a dependeny manager for php projects

// (Composer needs to be downloaded and installed on your local machine)
// after that use cmd>composer -v to verify the installation
// then add composer.json to the project's root folder
// then add the autoload array to it
// then open up cmd or terminal, navigate to project folder (where composer.json exists)
// and run cmd> composer dump-autoload

// composer will create a directory called vendor
// the autoload.php files is more important for us

// load the autoload.php file into bootstrap.php using the require_once construct
// now you can use User class in index.php
// from now on, whenever you have a new class in models dir, you need to run command dump-autoload again
// otherwise you will get an error (if try to use a new class without running dump-autoload)

$comment = new Comment('<h1>Hello</h1>');
echo $comment->getComment();


// PSR stands for PHP Standard Recommendation
// PSR is a PHP specification published by the PHP Framework Interop Group or PHP-FIG
// PHP-FIG has published many PSR starting from PSR-0
// PSR-4 is autoloading standard

// to comply with PSR-4 we need to update the structure of this project to the following
/*

├── app
│   ├── Acme
│   │   ├── Auth
│   │   │   └── User.php
│   │   └── Blog
│   │       └── Comment.php
│   └── bootstrap.php
├── composer.json
└── index.php

*/

// models dir is deleted
// User.php is under Acme/Auth folder
// User class is namespaced with Acme/Auth
// namespaces map to directory structure
// 