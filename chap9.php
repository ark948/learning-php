<?php
    include 'Movie.php';

    $mov1 = new Movie('N001', 'Lusso', 4.99);

    // $this refers to the current object

    $mov2 = new Movie('P002', 'Junior', 5.99);


    echo $mov1->title.'<br>';
    echo $mov1->conversion('Japan').'<br>';

    // we access '->' (arrow operator) to access properties and methods (but not constants)
    
    echo Movie::DISCOUNT.'<br>';
    echo $mov1::DISCOUNT.'<br>';
    echo $mov2::DISCOUNT.'<br>';

    // to access constants we use '::' operator (scope resolution operator).
    // all constants are defined only once, even for all instances of the same object
    // there will be only one of them allocated in memory

    // Access Modifiers
    // public can be accessed anywhere
    // private can only be accessed in its class where it is declared

    // declaring modifier for properties is mandatory, but not for methods
    // if not provided for methods, the default is public
    // as of PHP 7.1.0 access modifiers can be declaraed for constants as well
    // default is public

    // there is also a 'protected' access modifier
    // they can be access inside the class and any object that inherits from that class

    echo $mov1->displayHeading('H1');

    $mov1->rentalPrice = 5.99;
    echo $mov1->rentalPrice;

    echo '<br>';
    echo $mov1;