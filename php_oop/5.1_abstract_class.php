<?php


// An abstract class is a class that cannot be instantiated. 
// Typically, an abstract defines an interface for other classes to extend


// If a class extends an abstract class, it must implement all abstract methods or itself be declared abstract.

// The following example defines an abstract class called Dumper that has an abstract method dump()

abstract class Dumper
{
    abstract public function dump($data);
}

// The following defines the WebDumper class that extends the Dumper class.
// Since the Dumper class has the dump() abstract method, the WebDumper class needs to implement the dump() method:k
class WebDumper extends Dumper
{
	public function dump($data)
	{
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
}


// another class that dumps the information on the console (for example)
class ConsoleDumper extends Dumper
{
	public function dump($data)
	{
		var_dump($data);
	}
}


// The following defines a DumperFactory class that has a static method getDumper()
// The getDumper() method returns a new WebDumper object if the script is executed on the webserver 
// and ConsoleDumper object if the script is executed on the command line
// a static method can be called from a class directly without an object

class DumperFactory
{
    public static function getDumper()
    {
        return PHP_SAPI === 'cli' ? new ConsoleDumper() : new WebDumper();
    }
}

// The following uses the DumperFactory to get a Dumper based on where the script runs and show a message
$dumper = DumperFactory::getDumper();
$dumper->dump('PHP abstract class is awesome!');

// if you this script using php command in cli, you'll get a different result than when running this script on browser

