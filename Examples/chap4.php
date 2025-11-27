<?php
    define("BASIC_MEMBER", 125);
    echo BASIC_MEMBER;
    $x = 7;
    echo $x;
    echo "The value of x is $x";

    // php is loosely typed, stating the data type is not needed
    // to verify the data type of a variable
    var_dump($x);

    // converting data types (type casting)
    $p = (int)4.6;
    var_dump($p); // int(4)