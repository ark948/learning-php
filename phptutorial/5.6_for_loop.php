<?php

// allows for repeating a block of code, until the expression is no longer true

for (start; condition; increment) {
	statement;
}

// start, condition and increment can be left empty,
// in that case, make sure to use a break statement to prevent an infinite loop
for (; ;) {
	// do something
	// ...

	// exit the loop
	if (condition) {
		break;
	}
    break; // this is just here, so this file will not accidentally execute
}


// an example, that will add numbers from 1 to 10:
$total = 0;

for ($i = 1; $i <= 10; $i++) {
	$total += $i;
}

echo $total; // 55

// alternative syntax
$total = 0;

for ($i = 1; $i <= 10; $i++):
	$total += $i;
endfor;

echo $total; // 55