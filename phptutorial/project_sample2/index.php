<?php


// the following function loads the code from the file specified by $file parameter
// and data can be passed to specified file using the $data parameter
function view(string $file, array $data): void
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require __DIR__ . $file;
}

// From the $file script, you can access the elements of the $data array.

view(
    'inc/home.php',
    [
        'title' => 'Home',
        'heading' => 'Welcome to my homepage'
    ]
);

