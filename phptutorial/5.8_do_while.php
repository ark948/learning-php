<?php

// unlike while, the do-while loop evaluates the expression at the end of each iteration
// which means that loop is exeucted at least once

// the following example, the loop will execute only once
$i = 0;
do {
    echo $i;
} while ($i > 0);

// in the following example, loop will execute ten times

$i = 10;
do {
    echo $i . '<br>';
    $i--;
} while ($i > 0);

