<?php

/**
 * Without CSRF protection, any attacker can just copy the address that the form will be submitted to and submit the form with any value they want.
 * All they have to do is to just copy the action attribute of the form from the page source code.
 * 
 * CSRF attack (Cross-site Request Forgery): an attack where a logged-in user is tricked into performing actions they did not intend.
 * 
 * 
 * How to prevent CSRF attack?
 * 1. Use CSRF tokens.
 * Generate a random token for each form/request, store it in user's session and embed it in forms.
 * Upon form submission, check if the form matches.
 */

if ($_POST['']) {
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    echo "You transfered: " . $amount . " $";
}

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
        Email:
        <input type="text" name="email">
        Amount:
        <input type="text" name="amount">
        <button type="submit" name="submit">Transfer</button>
    </form>
</body>
</html>