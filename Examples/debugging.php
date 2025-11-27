<?php

    // in this file we will create:
    // an exception handler, an error handler and a shutdown function
    // inside all these three functions, we will call our custom debugger

    function myDebugger($msg, $file, $line, $trace='')
    {
        $message = $trace.'<br><br><strong>'.$msg.'</strong> found on <u>line '.$line.'</u> in file <u>'.$file.'</u>';

        if (ini_get('display_errors')) {
            echo $message;
        } else {
            error_log($message);
            // this will log the error into the logs folder in xampp
            header('Location: error.html');
            // this will navigate the user to a friendly error page
        }
    }

    function myExceptionHandler($e)
    {
        myDebugger($e->getMessage(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
    }

    function myErrorHandler($errno, $errstr, $errfile, $errline)
    {
        myDebugger($errstr, $errfile, $errline);
    }

    function myShutdownHandler()
    {
        $lastError = error_get_last();
        if (isset($lastError)) {
            myDebugger($lastError['message'], $lastError['file'], $lastError['line']);
        }
    }

    set_exception_handler('myExceptionHandler');
    set_error_handler('myErrorHandler');
    register_shutdown_function('myShutdownHandler');