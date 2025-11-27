<?php

// unlike logical AND and OR,
// the logical NOT operator only accepts one operand and negates it

// it returns true if operand is false, and returns false if operand is true

// we can use not and !

$priority = 5;
var_dump( ! $priority < 5 ); // bool(true)

// first $priority < 5 evaluates to false
// and then ! false evaluates to true