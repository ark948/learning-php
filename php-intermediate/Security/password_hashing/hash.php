<?php

// md5(), sha1()
// best to use password_hash()

// demonstration purposes only (use password_hash())
$pass = "code";
$hashedPass = md5($pass);
echo $hashedPass . PHP_EOL; // resluting hash can be converted back to original password


$hashedPass2 = password_hash(password: $pass, algo: PASSWORD_DEFAULT);
echo $hashedPass2 . PHP_EOL;

if (password_verify(password: $pass, hash: $hashedPass2)) {
    echo "You got the password right, you will be logged in." . PHP_EOL;
} else {
    echo "Wrong password." . PHP_EOL;
}