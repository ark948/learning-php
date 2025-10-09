<?php


// property_exists() to check if a class or an object has a property

// returns true if it does, false otherwise
// and in case of an error, it will return null

// The following example uses the property_exists() function to check if the FileReader class has a specific property

class FileReader
{
    private $filename;
    public $done;
    protected $filesize;
    public static $mimeTypes;
}

var_dump(property_exists(FileReader::class, 'filename')); // true
var_dump(property_exists(FileReader::class, 'done')); // true
var_dump(property_exists(FileReader::class, 'filesize')); // true
var_dump(property_exists(FileReader::class, 'mimeTypes')); // true

var_dump(property_exists(FileReader::class, 'status')); // false


// another practical example
// Suppose that you have a base class called Model. All the model classes need to extend this Model class

// To load a Model object from an associative array, you can define a load() method in the Model class as follows
abstract class Model
{
    public function load(array $data): self
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        return $this;
    }
}

// The load() method accepts an associative array as an argument. 
// It iterates over the array element,...
// If the object has a property that matches a key in the array, the load() method assigns the value to the property.

// The following defines the User class that extends the Model class:
class User extends Model
{
    private $username;
    private $email;
    private $password;
}

// To populate the properties of the User class with values of an array, you call the load() method like this
$user = (
    new User())->load([
    'username' => 'john',
    'email' => 'john@phptutorial.net',
    'password' => password_hash('VerySecurePa$$1.', PASSWORD_DEFAULT),
]);


// In practice, you would have a registration form. After the form is submitted, 
// you need to validate the data in the $_POST array. And then you call the load() method to initialize a User object.