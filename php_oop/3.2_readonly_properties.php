<?php


// php 8.1 introduced properties that can be only initalized once

// to do that, add readonly keyword to a typed property

class User1
{
    public readonly string $username;
    public function __construct(string $username)
    {
        $this->username = $username;
    }
}


$user = new User1('secure');

// now if you attempt to change username property you get a fatal error


class User2
{
    public readonly string $username;
    public string $password;
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}

$user = new User2();
$user->setUsername('joe');

echo $user->username;


// IMPORTANT
// if you call setUsername a second time, you will get a fatal error

// IMPORTANT
// readonly properties MUST have a type (type hinted)

// readonly property does not ensure the immutability of objects (objects as properties)
// consider the following classes of User and UserProfile
class UserProfile
{
    public function __construct(private string $name, private string $phone)
    {
    }
    public function changePhone(string $phone)
    {
        $this->phone = $phone;
    }
}

class User
{
    private readonly string $username;
    private readonly UserProfile $profile; // Object as property
    public function __construct(string $username)
    {
        $this->username = $username;
    }
    public function setProfile(UserProfile $profile)
    {
        $this->profile = $profile;
    }
    public function profile(): UserProfile
    {
        return $this->profile;
    }
}


$user = new User('joe');
$user->setProfile(new UserProfile('Joe Doe','(408)-555-6666'));
$user->profile()->changePhone('(408)-999-9999');
var_dump($user->profile()); // it will be changed