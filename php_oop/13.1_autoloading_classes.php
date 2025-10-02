<?php

// it is good practice to keep php classes in separate files
// also name of the class should be as same as the file name
// e.g. Contact.php should include the Contact class

// classes (in files) could be loaded using either, require, require_once, include, include_once

// if the number of classes grow, using these statements can be hard to manage

// one way to resolve this, is to write a helper function that will import the class from a file with the same name
// (supposedly if all classes were in models directory of the current project)
function load_model($class_name): void
{
    $path_to_file = 'models/' . $class_name . 'php';
    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}


// example
// load_model('Person');

// php 5.1.2 introduced the spl_autoload_register() function that automatically loads a class file
// IMPORTANT
// PHP 7.2.0 deprecated the __autoload() magic function and recommended to use the spl_autoload_register() function instead.

// When you use a class that has not been loaded, PHP will automatically look for spl_autoload_register() function call.
// The spl_autoload_register() function accepts a callback function and calls it when you attempt to create use a class that has not been loaded.

// To use the spl_autoload_register() function, you can pass the load_model function to it

spl_autoload_register('load_model');

// place this inside functions.php (where load_model will reside)
// then all we have to in index.php is to require 'functions.php'

// spl_autoload_functions could be multiple
spl_autoload_register('autoloader1');
spl_autoload_register('autoloader2');
spl_autoload_register('autoloader3');




// Project folder of this lesson -> Autoloading