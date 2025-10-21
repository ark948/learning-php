<?php


// Suppose that you have an array returned by a function parse_url()
$urls = parse_url('https://www.phptutorial.net/');
var_dump($urls);


/*
array(3) {
    ["scheme"]=>  string(5) "https"
    ["host"]=> string(19) "www.phptutorial.net"
    ["path"]=> string(1) "/"
}
*/

// we can use the list() construct to assign the elements of the array to multiple variables
list('scheme' => $scheme,
    'host' => $host,
    'path'=>$path
) = parse_url('https://www.phptutorial.net/');


// PHP 7.1 introduced a new way of unpacking the array’s elements into variables. It’s called array destructuring
[ 'scheme'=>$scheme, 'host'=>$host, 'path'=>$path ] = parse_url('https://www.phptutorial.net/');

// Like the list(), the array destructuring works with both indexed and associative arrays
$person = ['John','Doe'];
[$first_name, $last_name] = $person;


// The array destructuring syntax also allows you to skip any elements. For example, the following skips the second element of the array
$person = ['John','Doe', 24];
[$first_name, , $age] = $person;



// To swap the values of two variables, you often use a temporary variable like this
$x = 10;
$y = 20;

// swap variables
$tmp = $x;
$x = $y;
$y = $tmp;

// Now, you can use the array destructuring syntax to make the code shorter
$x = 10;
$y = 20;

// swap variables
[$x, $y] = [$y, $x];


// Many functions in PHP return an array. The array destructuring allows you to parse an array returned from a function.
['dirname' => $dirname, 'basename' => $basename ] = pathinfo('c:\temp\readme.txt');

