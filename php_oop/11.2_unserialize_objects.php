<?php


// use unserialize() to convert a serialized string to object

// unserialize(string $data, array $options = []): mixed
// data is the serialized string
// options is associative array that contains options for conversion

// If the unserialize() function cannot convert the serialized string ($data) into an object, it returns false with an E_NOTICE.

// Notice that the unserialize() function also returns false if the unserialized string is serialized from the false value.

class Customer
{
    public function __construct( private int $id, private string $name, private string $email ) {
    }

    public function getInitial()
    {
        if ($this->name !== '') {
            return strtoupper(substr($this->name, 0, 1));
        }
    }
}

// serialize the object and save it into a file
$customer = new Customer(10, 'John Doe', 'john.doe@example.com');
$str = serialize($customer);
file_put_contents('customer.dat', $str);

// then try to read it and unserialize it

$str = file_get_contents('customer.dat');
$customer = unserialize($str);
var_dump($customer);

/*
object(Customer)#1 (3) {
    ["id":"Customer":private]=> int(10)
    ["name":"Customer":private]=> string(8) "John Doe"
    ["email":"Customer":private]=> string(20) "john.doe@example.com"
}
*/

// when unserializing, if the class is not known, the unserialize function will create an obj of type  __PHP_Incomplete_Class instead
// example, if require require statement containing the class declaration was removed
/*
object(**PHP_Incomplete_Class)#1 (4) {
    ["**PHP_Incomplete_Class_Name"]=> string(8) "Customer"
    ["id":"Customer":private]=> int(10)
    ["name":"Customer":private]=> string(8) "John Doe"
    ["email":"Customer":private]=> string(20) "john.doe@example.com"
}
*/

// IMPORTANT
// The unserialize() function creates a completely new object that does not reference the original object.

// The unserialize() function checks if the object has the __unserialize() method. 
// If so, it’ll call the __unserialize() method to restore the object’s state.

// example
class FileReader
{
    private $filehandle;
    private $filename;
    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->open();
    }

    private function open()
    {
        $this->filehandle = fopen($this->filename, 'r');
        return $this;
    }

    public function read()
    {
        $contents = fread($this->filehandle, filesize($this->filename));
        return nl2br($contents);
    }

    public function close()
    {
        if ($this->filehandle) {
            fclose($this->filehandle);
        }
    }

    public function __sleep(): array
    {
        $this->close();
        return array('filename');
    }

    public function __unserialize(array $data): void
    {
        // arg is required, but was not included in this lesson
        $this->open();
    }
}

// the __unserialize() method re-opens the file once the FileReader object is unserialized.
// then, we try to serialize a FileReader object, save it into the objects.dat file, and unserialize it

$filename = 'objects.dat';
// serialize the $fileReader
file_put_contents(
    $filename,
    serialize(new FileReader('readme.txt'))
);

// unserialized the file reader
$file_reader = unserialize(file_get_contents($filename));
echo $file_reader->read();
$file_reader->close();


// IMPORTANT
// Similar to the __unserialize() method, the unserialize() function also checks for the existence of the __wakeup()
// if present, the unserialize() function will call the __wakeup() method to reconstruct the state that the object may have.
// In practice, you can perform reinitialization tasks in the __wakeup() method, such as reopening the file or re-connecting to the database.
// if both wakeup and unserialize exist, wakeup is ignored

?>

<?php
// EXAMPLE, from php manual
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __serialize(): array
    {
        return [
          'dsn' => $this->dsn,
          'user' => $this->username,
          'pass' => $this->password,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->dsn = $data['dsn'];
        $this->username = $data['user'];
        $this->password = $data['pass'];

        $this->connect();
    }
}?>