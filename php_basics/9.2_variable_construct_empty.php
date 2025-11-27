<?php


// empty() construct accepts a variable and returns true if variable is empty
// false otherwise

// empty(mixed $v): bool

// a value that is falsy (can be converted to 0) is empty
// or that is not set

// empty($v) is essentially as same as the following:
!isset($v) ||  $v == false;

// example
// the following returns true because the $count variable is not declared
var_dump(empty($count)); // true

// the following is also true, since $count is zero, which becomes false
$count = 0;
var_dump(empty($count)); // true


// the following returns true for all values of the $falsy_array
$falsy_values = [false, 0, 0.0, "0", '', null, []];

foreach($falsy_values as $value) {
    var_dump(empty($value));
}


// example of using empty
isset($data['username']) && ($data['username'] !== '');
// this is as same as
!empty($data['username']);


// IMPORTANT
// difference between isset() and empty()
// isset() only checks if a variable is set and not null. 
// It does not check the value's content, only its existence. 
// empty() checks whether a variable contains a "falsy" value (e.g., 0, "", null, false, etc.)