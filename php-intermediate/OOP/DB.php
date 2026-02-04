<?php

/**
 * Object Oriented Programming + pillars of OOP
 * Access modifiers
 * $this keyword
 */

class DB {
    public $name = "Dude";
    public $email;

    private $phoneNumber = "010234256";
    private $phoneNumber2;

    public function __construct($name) {
        $this->name = $name;
        echo "user" . $this->name . " is created.";
    }

    public function __destruct() {
        // fires when object is destroyed (end of script is reached or manually using unset())
        echo "END OF SCRIPT. object is destroyed and so as the user.";
    }

    public function printPassword($password) {
        // public is default
        return "Print my password: $password";
    }

    public function printInfo($password) {
        return "Your info: " . $this->name . $this->printPassword($password);
    }

    public function getNumber() {
        return $this->phoneNumber2;
    }

    public function setNumber($num) {
        if (strlen($num) > 15) {
            echo "Invalid value";
            return false;
        }
        $this->phoneNumber2 = $num;
        return true;
    }
}


$db = new DB("Person 1");
echo $db->name;

$db->email = "dude@test.com";
echo "<br>";
echo $db->email;
echo "<br>";
echo $db->printPassword(1234);
echo $db->printInfo(1234);

$db2 = new DB("Person 2");
echo $db2->printInfo(7890);

// echo $db->phoneNumber; error, phoneNumber is not accessible

$db->setNumber(3478914);
echo $db->getNumber();