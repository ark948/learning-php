<?php


// while will execute the statement repeatedly until the condition is no longer true

// Since PHP evaluates the expression before each iteration, the while loop is also known as a pretest loop.

// while loop does not require curly braces if there is only one statement

$total = 0;
$number = 1;

while ($number <= 10) {
	$total += $number;
	$number++;
}

echo $total; // 55

// alternate syntax
$total = 0;
$number = 1;

while ($number <= 10) :
	$total += $number;
	$number++;
endwhile;

echo $total; // 55

