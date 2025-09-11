<?php

    // IMPORTANT: php is partially case-sensitive.
    // some things are case-sensitive and some tings are not 

    // the following are case-sensitive
    // php constructs such as if, if-else, if-elseif, switch, while, do-while etc.
    // keywords such as true and false
    // user-defined functions and class names

    // on the other hand:
    // variables are case-sensitive: $message and $Message are different

    // simple assignment statement
    $message = "Hello";

    // the following is a compound statement:
    if ($message) {
        echo $message;
    }

    // the closing tag of a php block automatically implies a semicolon
    // therefore the last statement does not need a semicolon

    // whitespaces and line breaks have no special meaning
    // having a statement in one line or spanning it across multiple likes is ok (as long as syntax is correct)
    