<?php

require  __DIR__ . '/sanitization.php';

$inputs = [
    'name' => 'joe<script>',
    'email' => 'joe@example.com</>',
    'age' => '18abc',
    'weight' => '100.12lb',
    'github' => 'https://github.com/joe',
    'hobbies' => [
        ' Reading',
        'Running ',
        ' Programming '
    ]
];

$fields = [
    'name' => 'string',
    'email' => 'email',
    'age' => 'int',
    'weight' => 'float',
    'github' => 'url',
    'hobbies' => 'string[]'
];

$data = sanitize($inputs,$fields);

var_dump($data);


/*
output:
array (size=6)
  'name' => string 'joe&#60;script&#62;' (length=19)
  'email' => string 'joe@example.com' (length=15)
  'age' => string '18' (length=2)
  'weight' => string '100.12' (length=6)
  'github' => string 'https://github.com/joe' (length=22)
  'hobbies' => 
    array (size=3)
      0 => string 'Reading' (length=7)
      1 => string 'Running' (length=7)
      2 => string 'Programming' (length=11)

*/