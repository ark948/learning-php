<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the email field is set and not empty
    if (filter_has_var(INPUT_POST, 'email')) {
        // validate email
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        // if email is valid, filter_input will return false
        if ($email !== false) {
            echo "Email is valid: " . htmlspecialchars($email);
        } else {
            echo "Invalid email format." . $_POST['email'];
        }
    } 
}

?>


<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email">
        <button type="submit">Submit</button>
    </div>
</form>