<?php

// a class desctructor method allows for cleaning up the resources when an object is deleted (no longer has any reference)

// it does not accept any args

// is automatically invoked when an object is deleted
// either when it has no reference or the script ends

class File
{
    private $handle;
    private $filename;
    public function __construct($filename, $mode='r')
    {
        $this->filename = $filename;
        $this->handle = fopen($filename, $mode);
    }

    public function __destruct()
    {
        // handle closing of the filehandle
        if ($this->handle) {
            fclose($this->handle);
        }
    }

    public function read()
	{
		// read the file contents
		return fread($this->handle, filesize($this->filename));
	}
}

$f = new File('./test.txt');
echo $f->read();