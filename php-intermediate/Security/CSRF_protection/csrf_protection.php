<?php

session_start();

if ($_POST['submit']) {
    if (!isset($_SESSION['csrf_token']) OR $_SESSION['csrf_token'] != $_POST['csrf_token']) {
        // if csrf_token is missing from submitted form or does not match the one in session
        die("something went wrong.");
    }
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    echo "You transfered: " . $amount . " $";
}

$_SESSION['csrf_token'] = bin2hex(string: random_bytes(length: 32));
// random_bytes() -> generates bytes of cryptographically secure data
// bin2hex() -> raw bytes may contain non-printable characters. bin2hex() converts them to hexadecimal string.
// each byte becomes 2 hex chars
// 32 bytes -> 64 chars

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transfer money</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        Email:
        <input type="text" name="email">
        Amount:
        <input type="text" name="amount">
        <button type="submit" name="submit">Transfer</button>
    </form>
</body>
</html>