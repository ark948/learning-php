<?php
    function myErrorHandler($errno, $errstr, $errfile, $errline)
    {
        echo '<br>Oppss... An error occurred.<br>'.$errstr;
    }

    set_error_handler('myErrorHandler');

    // for a custom error handler, the first two parameters are mandatory.

    // a custom error handler does not result in script termination.

    echo $a; // this will raise an undefined variable error
    echo '<br>Script is not terminated.';

    // custom error handler is unable to handle fatal errors.
    // which will lead to script termination.

    // to handle these errors, we need another built-in function,
    // called register_shutdown_function()
    // this function will tell php which function to run when an script,
    // is about to be terminated

    function myShutdownHandler()
    {
        $lastError = error_get_last();
        if (isset($lastError)) {
            echo '<br>Oppss... Script terminated.<br>';
        }
    }

    register_shutdown_function('myShutdownHandler');
    ini_set('display_errors', '0');


    // we need to determine whether termination is due to an error.
    // we'll use error_get_last()
    // returns NULL if no error has occurred.
    // example: termination could be because user navigated to another page.

    // if there was an error
    // it will return the last error as an associative array, containing
    // four keys: type, message, file, line

    hello(); // this will raise a Fatal error, uncaught error

    