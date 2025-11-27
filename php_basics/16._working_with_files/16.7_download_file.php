<?php


// the readfile() function reads data from a file and writes it to output buffer

// readfile ( string $filename , bool $use_include_path = false , resource $context = ? ) : int|false
// filename is path to file
// use_include path, if true, will search for file in path
// context specifies the stream context

// the readfile() returns the number of bytes if successfully reads data from file, or false if fail to read

// example of how to download readme.pdf file
$filename = 'readme.txt';
if (file_exists($filename)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filename));
	readfile($filename);
	exit;
}


// following example shows how to set a download rate limit
$file_to_download = 'book.pdf';
$client_file = 'mybook.pdf';

$download_rate = 200; // 200Kb/s

$f = null;

try {
    // if file does not exist, raise an exception
	if (!file_exists($file_to_download)) {
		throw new Exception('File ' . $file_to_download . ' does not exist');
	}


    // raise an exception if file is not a regular file
    if (!is_file($file_to_download)) {
		throw new Exception('File ' . $file_to_download . ' is not valid');
	}

    header('Cache-control: private');
	header('Content-Type: application/octet-stream');
	header('Content-Length: ' . filesize($file_to_download));
	header('Content-Disposition: filename=' . $client_file);

    	// flush the content to the web browser
	flush();

	$f = fopen($file_to_download, 'r');

	while (!feof($f)) {
		// send the file part to the web browser
		print fread($f, round($download_rate * 1024));

		// flush the content to the web browser
		flush();

		// sleep one second
		sleep(1);
    }
} catch (\Throwable $e) {
    // IMPORTANT
    // the backslash tells this catch block to use the built-in Throwable from the global namespace to avoid any possible collisions
    echo $e->getMessage();
} finally {
    if ($f) {
        fclose($f);
    }
}