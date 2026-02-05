<?php


/**
 * Abstraction: a OOP concept, suggests to hide the internal implementaiton and logic and only show the necessary features to the user
 * 
 * like a TV remote control
 * User will use the remote via its buttons
 * User does not have to know or interact with the internal circuitry
 */


abstract class Phone {
    abstract function printPhoneName();
    public function openPhone() {
        return " phone is starting... ";
    }
}


class Samsung extends Phone {
    public function printPhoneName() {
        return " hello from Samsung. ";
    }
}


class Infinix extends Phone {
    public function printPhoneName() {
        return " hello from Infinix. ";
    }
}


$sam = new Samsung();
echo $sam->printPhoneName();
echo $sam->openPhone();

$inf = new Infinix;
echo $inf->printPhoneName();
echo $inf->openPhone();