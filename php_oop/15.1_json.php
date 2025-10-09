<?php


// in this lesson we learn how to convert data in php to JSON and vice versia using php json extension

// json data (collection of name/value pairs) are equivalent to associative array

// the php json extension comes with php installation by default

// to get json representation of a variable you use the json_encode() function
// json_encode ( mixed $value , int $flags = 0 , int $depth = 512 ) : string|false

// exmaple, convert an indexed array to json
$names = ['Alice', 'Bob', 'John'];
$json_data = json_encode($names);

// return JSON to browsers
header('Content-Type:application/json');
echo $json_data;

// example of converting associative array to json
$person = [
    'name' => 'Alice',
    'age' => 20
];

// header('Content-type:application/json');
echo json_encode($person);


// converting json data to php variables
// json_decode ( string $json , bool|null $associative = null , int $depth = 512 , int $flags = 0 ) : mixed

// example of converting json to php
$json_data = '{"name":"Alice","age":20}';
$person = json_decode($json_data);
var_dump($person);
// the output type will be of object(stdClass)
// to convert json data to other specific classes, we need to map the key values manually, or use a third-party package


// Serializing PHP objects
// to serialize object to json, we need to implement JsonSerializable interface and a method of the same name
// example
class Person implements JsonSerializable
{
    private $name;
    private $age;
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'age' => $this->age
        ];
    }
}

// serialize object to json
$alice = new Person('Alice', 20);
echo json_encode($alice); // {"name":"Alice","age":20}

