<?php


// traits allow for sharing functionality among independent classes which are not in the same inheritance hierarchy

// php 5.4 introduced trait

// trait allow to use various methods in different classes without inheritance

// traits have no instances

trait Logger
{
	public function log($msg)
	{
		echo '<pre>';
		echo date('Y-m-d h:i:s') . ':' . '(' . __CLASS__ . ') ' . $msg . '<br/>';
		echo '</pre>';
	}
}

// now we define a class and use the Logger trait inside it
class BankAccount
{
	use Logger;
	private $accountNumber;
	public function __construct($accountNumber)
	{
		$this->accountNumber = $accountNumber;
		$this->log("A new $accountNumber bank account created");
	}
}


$a = new BankAccount(125);
$a->log('hello');

class User
{
	use Logger;
	public function __construct()
	{
		$this->log('A new user created');
	}
}

$b = new User();
$b->log('user');



// A class can use multiple traits. The following example demonstrates how to use multiple traits in the IDE class. 
// It simulates the C compilation model in PHP for the sake of demonstration.
trait Preprocessor
{
	public function preprocess()
	{
		echo 'Preprocess...done' . '<br/>';
	}
}
trait Compiler
{
	public function compile()
	{
		echo 'Compile code... done' . '<br/>';
	}
}

trait Assembler
{
	public function createObjCode()
	{
		echo 'Create the object code files... done.' . '<br/>';
	}
}

trait Linker
{
	public function createExec()
	{
		echo 'Create the executable file...done' . '<br/>';
	}
}


// IDE class uses different traits
class IDE
{
	use Preprocessor, Compiler, Assembler, Linker;
	public function run()
	{
		$this->preprocess();
		$this->compile();
		$this->createObjCode();
		$this->createExec();

		echo 'Execute the file...done' . '<br/>';
	}
}

$ide = new IDE();
$ide->run();

// traits can also use each other, (Composing traits)
trait Reader
{
	public function read($source)
	{
		echo sprintf('Read from %s <br>', $source);
	}
}

trait Writer
{
	public function write($destination)
	{
		echo sprintf('Write to %s <br>', $destination);
	}
}

trait Copier
{
	use Reader, Writer;
	public function copy($source, $destination)
	{
		$this->read($source);
		$this->write($destination);
	}
}

class FileUtil
{
	use Copier;
	public function copyFile($source, $destination)
	{
		$this->copy($source, $destination);
	}
}



// PHP trait's method conflict resolution
// When a class uses multiple traits that share the same method name, PHP will raise a fatal error

// Fortunately, you can instruct PHP to use the method by using the insteadof keyword. For example
trait FileLogger
{
	public function log($msg)
	{
		echo 'File Logger ' . date('Y-m-d h:i:s') . ':' . $msg . '<br/>';
	}
}

trait DatabaseLogger
{
	public function log($msg)
	{
		echo 'Database Logger ' . date('Y-m-d h:i:s') . ':' . $msg . '<br/>';
	}
}

class Logger
{
	use FileLogger, DatabaseLogger{
		FileLogger::log insteadof DatabaseLogger;
	}
}

// Both FileLogger and DatabaseLogger traits have the same  log() method.
// In the Logger class,
//  we resolved the method name conflict by specifying that the log() method of the FileLogger trait will be used instead of the DatabaseLogger‘s

// but if you need to use both, you can use aliases
// By using aliases for the same method name of multiple traits, you can reuse all the methods in those traits.
// You use the as keyword to alias a method of a trait to a different name within the class that uses the trait.
class Logger
{
	use FileLogger, DatabaseLogger{
		DatabaseLogger::log as logToDatabase;
		FileLogger::log insteadof DatabaseLogger;
	}
}

// now we can use both
$logger = new Logger();
$logger->log('this is a test message #1');
$logger->logToDatabase('this is a test message #2');

// The method  log() of the DatabaseLogger class has a new name ( logToDatabase)  in the context of the Logger class.

