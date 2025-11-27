<?php


// the following two arrays are examples of a one-dimensional array
$scores = [1, 2, 3, 4, 5];

$rates = [
	'Excellent' => 5,
	'Good' => 4,
	'OK' => 3,
	'Bad' => 2,
	'Very Bad' => 1
];

// A multidimensional array is an array that has more than one dimension.
// For example, a two-dimensional array is an array of arrays.

// The following example uses an array of arrays to define a two-dimensional array:
$tasks = [
    ['Learn PHP programming', 2],
    ['Practice PHP', 2],
    ['Work', 8],
    ['Do exercise', 1],
];

// In the $tasks array, the first dimension represents the tasks, and the second dimension specifies the hours spent for each.

print_r($tasks);

// to add elements to a multidimensional array:
// $array[] = [element1, element2, ...];


$tasks = [
	['Learn PHP programming', 2],
	['Practice PHP', 2],
	['Work', 8],
	['Do exercise', 1],
];
$tasks[] = ['Build something matter in PHP', 2];

print_r($tasks );

// To remove an element from a multidimensional array, you can use the unset() function.
unset($tasks[2]);

// NOTE: the entire index will be removed

// Note that the unset() function doesn’t change the array’s keys. To reindex the key, you can use the array_splice() function.
// THIS REQUIRES MUCH MORE PRACTICE
$tasks = [
	['Learn PHP programming', 2],
	['Practice PHP', 2],
	['Work', 8],
	['Do exercise', 1],
];
array_splice($tasks[2], 2, 1);

print_r($tasks);

// To iterate a multidimensional array, you use a nested foreach 
$tasks = [
	['Learn PHP programming', 2],
	['Practice PHP', 2],
	['Work', 8],
	['Do exercise', 1],
];

foreach ($tasks as $task) {
	foreach ($task as $task_detail) {
		echo $task_detail . '<br>';
	}
}

// to access elements
echo $tasks[0][1];

// To sort a multidimensional array, you use the usort() function.
$tasks = [
	['Learn PHP programming', 2],
	['Practice PHP', 2],
	['Work', 8],
	['Do excercise', 1],
];

usort($tasks, function ($a, $b) {
	return $a[1] <=> $b[1];
});

// In this example, we use the spaceship operator (<=>), which has been available since PHP 7...
// to compare the time spent on each task and sort the tasks by hours.