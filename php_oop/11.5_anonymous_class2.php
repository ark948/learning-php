<?php

// Like a regular class, a class can inherit from one named class.

interface Logger
{
    public function log(string $message): void;
}

// first we have this interface
// then we'll have an abstract class that will implement this logger

abstract class SimpleLogger implements Logger
{
    protected $newLine;
    public function __construct(bool $newLine)
    {
        $this->newLine = $newLine;
    }
    abstract public function log(string $message): void;
}

// third, we define an anonymous class that will extend the SimpleLogger class.
// we call the constructor of SimpleLogger in the constructor of the anonymous class
// IMPORTANT
// To pass an argument to the constructor, we place it in parentheses that follow the class keyword.

$logger = new class(true) extends SimpleLogger {
    public function __construct(bool $newLine)
    {
        parent::__construct($newLine);
    }
    public function log(string $message): void
    {
        echo $this->newLine ? $message . PHP_EOL : $message;
    }
};

$logger->log('Hello');
$logger->log('Bye');


// Anonymous classes are helpful in some cases
// e.g. Mock tests and unit testing (e.g. with PHPUnit)
// Second, anonymous classes keep their usage outside the scope where they are defined. For example, instead of doing this:
class ConsoleLogger 
{
    public function log($message) 
    {
        echo $message . PHP_EOL;
    }
}
$obj->setLogger(new ConsoleLogger());
// Now, you can make use the an anonymous class like this:
$obj->setLogger(new class {
    public function log($msg) {
       echo $message . PHP_EOL;
    }
});

// also, make a small optimization by avoid hitting the autoloader for trivial classes. (another use case of anonymous classes)