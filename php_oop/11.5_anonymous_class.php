<?php


// a regular class is also called a named class

// an anonymous class is a class without a declared name. the following creates an object of anonymous class
$myObject = new class {
    // you can define constructor, desctructor, properties and methods
};


interface Logger
{
    public function log(string $message): void;
}


$logger = new class {
    public function log(string $message): void
    {
        echo $message . '<br>';
    }
};

$logger2 = new class implements Logger {
    public function log(string $message): void
    {
        echo $message . '<br>';
    }
};

$logger->log('Hello');

// php generates a name for anonymous classes, to get the name:
echo get_class($logger);
// possible output: index.php0000025F568665BE
// PHP manages this class name internally. Therefore, you should not rely on it.

// an anonymous class can implement one or multiple interfaces
// added the Logger interface above $logger anonymous class
// the second anonymous logger class will implement Logger

echo $logger2 instanceof Logger; // true

// because an anonymous class does not have a name, we cannot use type hints for its instances
// but if it implemented an interface, we can use that instead

function save(Logger $logger)
{
    $logger->log('File was updated successfully.');
}

save($logger);

// Like a regular class, a class can inherit from one named class.
