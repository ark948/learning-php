<?php

// as type hints allow us to declare types for function params and return values
// strict types allow us to ensure matching of input and output

// in the previous add function, if you pass an integer and a float
// float will be converted to integer before the process, and the result is integer
// strict type will disable this feature

declare(strict_types=1); // this statement must come before anything else

// IMPORTANT: php enables the strict mode on per-file basis

// strict type has a special case
// when target type is float, integer can also be passed

function add(float $x, float $y)
{
    return $x + $y;
}

echo add(1, 2); // 3

// IMPORTANT
// strict types must be activated in each file
// even if we're including code from another file