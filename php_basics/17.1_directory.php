<?php


// php provides some functions to work with directories

// to manage a directory you need to get a directory handle
// to get the handle of a directory you pass the path to opendir()

$dh = opendir('./public');

// returns false in case of an error

// when you are done with working with the directory, you need to close the handle using closedir()

closedir($dh);

// to get the next entry (a file or a directory, supposedly a subdirectory) pass the handle to readdir()

// suppose we have the following public directory
/*
.
├── css
│   └── style.css
└── js
    └── app.js
*/

// the following example, lists all subdirs in the public dir
$dh = opendir('./public');
if ($dh) {
    while ($e = readdir($dh)) {
        if ($e !== '.' && $e !== '..') {
            echo $e, PHP_EOL;
        }
    }
}

closedir($dh);

/* output:
css
js
*/

// readdir() only returns the dirs and files of the current dir

// the following example is as same as previous example, but includes error handling
try {
	$dh = opendir('./public');
	if (!$dh) {
		throw new Exception('Error openning the directory');
	}
	while ($e = readdir($dh)) {
		if ($e !== '.' && $e !== '..') {
			echo $e . '<br>';
		}
	}
} catch (\Throwable $e) {
	echo $e->getMessage();
} finally {
	if ($dh) {
		closedir($dh);
	}
}


// by default, the current directory is the dir that holds the running script
// it will be used as a base for relative file paths

// to get the current directory
echo getcwd();

// to change the current dir to a new one, use the chdir()
chdir('./dev');
echo getcwd();

// to create a new dir, use the mkdir()
$dir = './public/img';
if (mkdir($dir)) {
	echo ' The dir ', $dir, 'created successfully!';
}

// the parent directory 'public' must exist
// by default, mkdir sets 0777 permission for the new dir
// you can pass another permission to mkdir if desired (as the second arg)

// te remove a dir, use the rmdir() but you need to have sufficient permissions
// and the directory must be empty
rmdir('./public/assets');

// to check if a path is a dir, use the is_dir(), returns true if it exists
$path = './public';
if (is_dir($path)) {
	echo $path, ' is a directory.';
}

