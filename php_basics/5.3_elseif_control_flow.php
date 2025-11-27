<?php


// The if statement can have one or more optional elseif clauses. The elseif is a combination of if and else:

// The following example uses the if elseif statement to display whether the variable $x is greater than $y
$x = 10;
$y = 20;

if ($x > $y) {
	$message = 'x is greater than y';
} elseif ($x < $y) {
	$message = 'x is less than y';
} else {
	$message = 'x is equal to y';
}

echo $message; // x is less than y

// php also supports an alternative syntax (in which curly braces are not added)

$x = 10;
$y = 20;

if ($x > $y):
    $message = 'x is greater than y';
elseif ($x < $y):
    $message = 'x is less than y';
else:
    $message = 'x is equal to y';
endif;

echo $message; // x is less than y

// this alternative syntax is suitable for HTML

// elseif can also be written as else if (in two words)
// but that will be equal to having a nested if else:
if ($expression) {
    echo 'something...';
} else {
    if ($expression2) {
        echo 'something else...';
    }
}

// NOTE: this cannot be used in alternative syntax

