<?php

// we use 'break' to terminate the current execution of loops
// it is typically used along with if statement inside loops

// IMPORTANT
// The break statement accepts an optional number that specifies the number of nested enclosing structures to be broken out of.
// If you don’t specify the optional number, it defaults to 1. In this case, the break statement only terminates the immediate enclosing structure.

// example
for ($i = 0; $i < 10; $i++) {
	if ($i === 5) {
		break;
	}
	echo "$i\n"; # outputs 0 to 4
}

// example with do...while
$j = 0;
do {
	if ($j === 5) {
		break;
	}
	echo "$j\n";
	$j++;
} while ($j <= 10);

// result is same, from 0 to 5

// example with while
$k = 0;
while ($k <= 10) {
	if ($k === 5) {
		break;
	}
	echo "$k\n";
	$k++;
}

// result is same



// The following example illustrates how to use the break statement to break of out a nested loop
$i = 0;
$j = 0;
for ($i = 0; $i < 5; $i++) {
	for ($j = 0; $j < 3; $j++) {
		if ($i === 3) {
			break 2;
		}
		echo "($i, $j)\n";
	}
}

// output:
// (0, 0)
// (0, 1)
// (0, 2)
// (1, 0)
// (1, 1)
// (1, 2)
// (2, 0)
// (2, 1)
// (2, 2)

// In this example, when the variable $i reaches 3, the break statement terminates the inner and outer loops immediately.

