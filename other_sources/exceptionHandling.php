<?php
    try {
        include "connect.php";
    } catch (PDOException $e) {
        echo '<br>Unable to connect '.$e->getMessage();
    } catch (Exception $e) {
        echo '<br>Something else happened'.$e->getMessage();
    } finally {
        echo '<br><br>The finally block is always executed';
    }

    echo '<br>After connecting';


    function displayUserInput(int $userInput) 
    {
        if ($userInput > 100) {
            throw new OutOfRangeException('<br>User input is too big.');
        } else {
            echo '<br>'.$userInput;
        }
    }

    try {
        displayUserInput(120);
    } catch (OutOfRangeException $e) {
        echo $e->getMessage();
    }

    function myExceptionHandler($e)
    {
        echo '<br>Oppsss... An uncaught exception occurred.<br>'.$e->getMessage();
    }

    // setting an exception handler for uncaught exceptions
    set_exception_handler('myExceptionHandler');

    // if custom exception handler is executed...
    // the script will terminate immediately (leads to script termination)

    $pdo = new PDO("some invalid database");
    echo 'This will not be executed.';