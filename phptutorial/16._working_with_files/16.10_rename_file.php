<?php


// to rename a funciton, use rename() function

// if oldname and newname has a different directory, rename() will move the file from current dir to new one, and rename the file

// if newname already exists, rename() will overwrite the oldname file

// simple examples
$oldname = 'readme.txt';
$newname = 'readme_v2.txt';

if (rename($oldname, $newname)) {
	$message = sprintf(
		'The file %s was renamed to %s successfully!',
		$oldname,
		$newname
	);
} else {
	$message = sprintf(
		'There was an error renaming file %s',
		$oldname
	);
}

echo $message;


// rename and move the file
// The following example uses the rename() function to move the readme.txt to the public directory and rename it to readme_v3.txt
$oldname = 'readme.txt';
$newname = 'public/readme_v3.txt';

if (rename($oldname, $newname)) {
	$message = sprintf(
		'The file %s was renamed to %s successfully!',
		$oldname,
		$newname
	);
} else {
	$message = sprintf(
		'There was an error renaming file %s',
		$oldname
	);
}

echo $message;



// The following example defines a function that allows you to rename multiple files. 
// The rename_files() function renames the files that match a pattern. It replaces a substring in the filenames with a new string.
function rename_files(string $pattern, string $search, string $replace) : array
{
	$paths = glob($pattern);
	$results = [];
	foreach ($paths as $path) {
		// check if the pathname is a file
		if (!is_file($path)) {
		    $results[$path] = false;
			continue;
		}
		// get the dir and filename
		$dirname = dirname($path);
		$filename = basename($path);
		// replace $search by $replace in the filename
		$new_path = $dirname . '/' . str_replace($search, $replace, $filename);
		// check if the new file exists
		if (file_exists($new_path)) {
		    $results[$path] = false;
			continue;
		}
		// rename the file
		$results[$path] = rename($path, $new_path);
	}
	return $results;
}

// The following uses the replace_files() function to rename all the *.md files in the pages directory to the *.html files:
rename_files('pages/*.md', '.md', '.html');