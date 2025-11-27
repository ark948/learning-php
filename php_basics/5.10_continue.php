<?php

// the 'continue' statement allows for skipping current iteration and jumping to next
// like break, continue also accepts an optional argument to specify the level of enclosing loops it will skip
// the default is 1

// typically used with if inside loops

for ($i = 0; $i < 10; $i++) {
	if ($i % 2 === 0) {
		continue;
	}
	echo "$i\n";
}


// 1
// 3
// 5
// 7
// 9

