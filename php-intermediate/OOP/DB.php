<?php

/**
 * Object Oriented Programming + pillars of OOP
 * Access modifiers
 * $this keyword
 */


/**
 * Encapsulation: bundling of data and methods into a single unit and restrict direct access to some of them to prevent potential damage.
 * 
 * why use encapsulation?
 * protect internal state of objects and data, prevent external code from being changed accidentally, provide controlled access to data
 * make code easier to maintain and debug
 */

class DB {
    public $name = "Dude";
    public $email;

    private $phoneNumber = "010234256";
    private $phoneNumber2;
    private $passCode; // prevent direct accesss using getter and setter
    // attempting to directly access a private property will result in error: Cannot access private property

    public function __construct($name) {
        $this->name = $name;
        echo "user" . $this->name . " is created.";
    }

    public function __destruct() {
        // fires when object is destroyed (end of script is reached or manually using unset())
        echo "END OF SCRIPT. object is destroyed and so as the user.";
    }

    public function setPass($passCode, $newPass) {
        if ($passCode !== "1234") {
            return false;
        }
        $this->passCode = $newPass;
    }

    public function getPass() {
        return $this->passCode;
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
$db->setPass('1234', 'new-password1234');
echo $db->getPass();