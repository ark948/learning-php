<?php



// The array_reduce() function reduces an array to a single value using a callback function.

$numbers = [10,20,30];
$total = 0;

foreach ($numbers as $number) {
    $total += $number;
}

echo $total; // 60

// Alternatively, you can use the array_reduce() function to achieve the same result
$numbers = [10,20,30];

$total  = array_reduce($numbers, function ($previous, $current) {
    return $previous + $current;
});

echo $total; // 60


// Since PHP 7.3 arrow functions can be used
$numbers = [10,20,30];

$total  = array_reduce(
    $numbers,
    fn ($previous, $current) => $previous + $current
);

echo $total; // 60


// here is the syntax
// array_reduce ( array $array , callable $callback , mixed $initial = null ) : mixed
// The $callback function is often called a reducer.
// it has the following signature
// callback ( mixed $carry , mixed $item ) : mixed
// The $carry holds the return value of the previous iteration. In the first iteration, it holds the value of the $initial instead.
// The $item holds the value of the current iteration.



// The following example uses the array_reduce() function to calculate the total items in a shopping car

$carts = [
    ['item' => 'A', 'qty' => 2, 'price' => 10],
    ['item' => 'B', 'qty' => 3, 'price' => 20],
    ['item' => 'C', 'qty' => 5, 'price' => 30]
];

$total = array_reduce(
    $carts,
    function ($prev, $item) {
        return $prev + $item['qty'] * $item['price'];
    }
);

echo $total; // 230
// if carts is empty, you get total as null

// To return zero instead of null, you pass the initial argument as zero to the array_reduce()
$total = array_reduce(
    $carts,
    function ($prev, $item) {
        return $prev + $item['qty'] * $item['price'];
    },
    0
);

