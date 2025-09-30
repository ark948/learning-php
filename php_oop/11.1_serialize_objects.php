<?php


// to serialize an object into string, we can use the serialize() function

// The serialize() function returns a string that contains a byte-stream representation of the object.
// then it can be stored in a file or database

class Customer
{
    private $id;
    private $name;
    private $email;
    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function __sleep(): array
    {
        return ['id', 'name'];
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

    public function getInitial()
    {
        if ($this->name !== '') {
            return strtoupper(substr($this->name, 0, 1));
        }
    }
}

// to use serialize() to serialize a Customer object
$customer = new Customer(10, 'John Doe', 'john.doe@example.com');
$str = serialize($customer);
var_dump($str); 
// string(132) "O:8:"Customer":3:{s:12:"Customerid";i:10;s:14:"Customername";s:8:"John Doe";s:15:"Customeremail";s:20:"john.doe@example.com";}"

// Notice that the serialize() function only serializes the properties of the object, not the method.

// the following example serializes an object and saves it into a file
$customer = new Customer(10, 'John Doe', 'john.doe@example.com');
$str = serialize($customer);
var_dump($str);
file_put_contents('customer.dat', $str);


// IMPORTANT
// The serialize() function checks if the class implements the __sleep() method.
// The __sleep() method returns an array that contains property names that will be serialized.
// If the __sleep() method doesn’t return anything, the serialize() function will serialize null value and issue an E_NOTICE.

// added the __sleep() method


// IMPORTANT
// In practice, you would want to encrypt sensitive information such as email and credit card numbers before carrying the serialization.


// The __serialize() method is similar to the __sleep() method
// However, the __serialize() method returns an associative array of key/value pairs representing the object’s serialized form
// if the __serialize() method doesn’t return an array, PHP will throw a TypeError.

// added the __serialize method to Customer class

// IMPORTANT
// If a class has both __serialize() and __sleep() method, 
// the serialize() function calls the __serialize() method only and ignores the __sleep() method.