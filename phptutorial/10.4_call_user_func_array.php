<?php


// The call_user_func_array() function calls a callback function with parameters.
// call_user_func_array(callable $callback, array $args): mixed

// The call_user_func_array() has two parameters:
    // $callback is the name of a function or any callable that will be called.
    // $args is an array that contains the parameters of the $callback.


function add(int $a, int $b): int {
    return $a + $b;
}

$result = call_user_func_array('add', [10,20]);

echo $result; // 30