<?php

    $msg = 'Hello';
    $greeting = "Good morning";
    $emptyStr = "";

    echo $msg;

    // the concatenate operator
    echo $msg . 'shit'.'<BR>';

    echo strlen($msg); // 5

    // original string is not changed
    echo strtolower('DAMN');
    echo strtoupper('hello');

    echo trim(' is ');

    $str7 = 'ABCDEF';
    echo substr($str7, 2).'<br>'; 
    // a third argument indicating length of substring to extract can also be provided

    echo strtotime('now');
    // returns the number of seconds passed from 1970 00:00:00 UTC

    echo('<br>');

    echo date('d-M-Y', strtotime('+ 10 hours'));
    // returns timestamp that is 10 hours from the current time in asked format
    // full list of format keywords are available in php.net -> function.date.php
    
    // both strtotime and date are affected by timezone set on server that php is running
    // it is recommended to manually set the timezone and be aware of it
    // it can be modified in php.ini

    $firstArr = array();
    $secondArr = array(11, 16, 4, 9);
    echo '<br>';
    echo $secondArr[0];
    
    $fruitArr = array('Apple', 'Banana', 'Coconut');

    // the following is know as a associative array
    $assocArr = array(
        'Peter' => 11,
        'Jane' => 16,
        'Paul' => 12
    );

    echo('<br>');
    echo $assocArr['Jane'];

    // the following is known as multidimensional array
    $mdArr = array(
        array(1, 2, 1, 4, 5),
        array(0, 5, 1, 3, 4),
        array(4, 1, 7, 8, 9)
    );

    echo "<br>";
    // echo $mdArr[0]; this will result in an error
    // echo and print expect strings
    // when and array is passed to echo, it attempts to convert it to an string
    // which will result in error
    // instead use implode or join, or resolve the problem in another way
    
    $secMDArr = array(
        "first" => array(1, 2, 3),
        "second" => array(4, 5, 6)
    );
    echo implode(', ', $secMDArr['first']);

    echo '<br>';

    $myArr = array(2, 5.1, 'PHP', 105);
    var_dump($myArr);
    print_r($myArr);

    // to add elements to array
    $addArr = array(1, 5, 3, 9);
    $addArr[] = 7; // add 7 to the end of addArr

    echo('<br>');
    echo implode(', ', $addArr);

    // to remove elements from array
    $colors = array("red", "black", "pink", "white");
    array_splice($colors, 2); // start from (and including) position 2 and remove the rest
    echo implode(', ', $colors); // red and black
    // a third argument can be specified to indicate number of removals

    // commonly used array functions
    echo count($addArr); // returns the number of elements
    echo('<br>');
    echo array_search('PHP', $myArr); // returns the position or key of search item
    // if more than one resutl is found, the first occurrence is returned

    echo in_array('PHP', $myArr); // returns True if item is found in array
    // False otherwise

    echo '<BR>';
    echo in_array("PHP", $myArr);

    echo('<br>');
    $num1 = array(1, 2);
    $num2 = array(4, 5);
    $num3 = array_merge($num1, $num2);
    echo implode(', ', $num3);

    echo '<br>';

    // if keys of associative array are integers, they are re-numbered
    // if use array_merge
    $names1 = array(5 => "Peter", 24 => "Aaron");
    $names2 = array(5 => "Zac", 4 => "Alfred", 7 => "Avi");
    $newArray2 = array_merge($names1, $names2);
    // peters becomes 0, Aaron becomes 1, and ..., Avi becomes 4

    // comparison operators
    // == equal
    // === identical (equal and the same data type)
    // != or <> not equal
    // !== not identical (not equal or not the same type) 5 !== 5.0 returns true
    // and the rest

    // <=> Spaceship operator
    // returns 0 if both sides are equal
    // returns 1 if left is greater
    // returns -1 if left is smaller

    // Logical operators
    // NOT !
    // AND && returns true if both left and right are true
    // NOTE: && is different than AND
    // && has a higher precedence than assignment operator
    // and has a lower precedence than assignment operator

    // OR or ||
    // || higher precedence


    // Control structures
    $a = 7;
    if ($a < 0)
    {
        echo 'if block<br>';
        echo '$a is smaller than 0';
    }
    elseif ($a < 5)
        echo 'first elseif block';
    else
        echo 'Else block';

    // Ternary operator
    $a = (7 == 7 ? "Yes" : "No");
    echo $a;

    // Switch statement
    // Important:
    // if a case without break matches...
    // it will be executed and every other case after it will ALSO execute
    // REGARDLESS of them matching
    // default is optional
    $b = 20;
    switch ($b)
    {
        case 10:
            echo 'Chocolate<br>';
            break;
        case 20:
            echo 'Lemon<br>';
            break;
        case 25:
            echo 'Strawberry';
            break;
        default:
            echo "Non of the above.";
    }



    // for loop
    for ($c = 1; $c < 5; ++$c) {
        echo 'The value of $c is '.$c.'<br>';
    }

    // foreach
    // this is similar to for, but is used to loop over ararys
    $arr1 = array(11, 12, 13, 14, 15);
    foreach ($arr1 as $num) {
        echo 'The number is '.$num.'<br>';
    }

    $arr2 = array(
        'Aaron' => 12,
        'Ben' => 23,
        'Carol' => 35
    );
    foreach ($arr2 as $name=>$age){
        echo $name.' is '.$age.' years old.<br>';
    }

    // while loop
    $d = 1;
    while ($d < 5)
    {
        echo 'The value of $d is '.$d.'<br>';
        $d++;
    }

    // do-while loop
    // the code will always be executed at least once
    $e = 100;
    do {
        echo 'The value is '.$e;
        $e++;
    } while ($e < 0);

    // break and continue
    // break will stop the loop completely
    // continue will skip the current iteration (loop will continue)
    for ($i = 0; $i < 10; ++$i)
    {
        echo '$i = '.$i.', ';
        if ($i == 4)
            continue;

        if ($i == 7)
            break;

        echo 'Element -> '.$i.'<br>'; // Element will not printed for 4
        // and will stop when it i reaches 7
    }

    // There is an alternative syntax for some PHP code such loops
    // thank is very similar to python colon (:) and indent syntax
    // very similar to jinja templates
    // it uses end statements such as endif, endfor, and ...
    // this can be useful for combining php code with html
    // an example:
    for ($i = 0; $i < 3; ++$i):
        echo '<h3>Hello</h3>';
    endfor;

    // functions
    // functions in php are not case-sensitive
    function displayGreetings($name, $surname='default surname') {
        echo 'hello from a function '.$name.' lastName: '.$surname;
        return $name;
        // the rest of the code after return is not executed
    }

    $name = displayGreetings('DUDE');
    echo $name;

    // parameters with default must come after required parameters

    // Type declaration (type hinting)
    // works for php 5 onwards
    // for php 5, type hinting will not work for scalar data types
    // scalar data types are types that only store a single value
    // such as int, float, bool, string

    // refer to file: typedec.php