<?php


// An interface allows you to specify a contract that a class must implement.

// interfaces consists of methods that contain no implementation, all are abstract
// they can include constants as well

// Note that all the methods in the interface must be public.

// A class can inherit from one class only. Howeer, it can implement multiple interfaces.

// To define a class that implements an interface, you use the implements keyword

// When a class implements an interface, it’s called a concrete class. 
// The concrete class needs to implement all the methods of the interface.

// IMPORTANT
// Just like classes, interfaces can also inherit from other interfaces

interface Readable
{
	public function read();
}

interface Document extends Readable
{
	public function getContents();
}


// interface example

interface Logger
{
    public function log($message);
}

class FileLogger implements Logger
{
	private $handle;
	private $logFile;
	public function __construct($filename, $mode = 'a')
	{
		$this->logFile = $filename;
		// open log file for append
		$this->handle = fopen($filename, $mode)
				or die('Could not open the log file');
	}

	public function log($message)
	{
		$message = date('F j, Y, g:i a') . ': ' . $message . "\n";
		fwrite($this->handle, $message);
	}

	public function __destruct()
	{
		if ($this->handle) {
			fclose($this->handle);
		}
	}
}


$logger = new FileLogger('./log.txt', 'w');
$logger->log('PHP interfae is awesome');

class DatabaseLogger implements Logger
{
	public function log($message)
	{
		echo sprintf("Log %s to the database\n", $message);
	}
}


// using multiple loggers
$loggers = [
	new FileLogger('./log.txt'),
	new DatabaseLogger()
];

foreach ($loggers as $logger) {
	$logger->log('Log message');
}