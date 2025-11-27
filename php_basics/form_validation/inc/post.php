<?php

const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';

// since this file only handles POST, we don't need to check the REQUEST_METHOD

// sanitize and validate name
if (filter_has_var(INPUT_POST, 'name')) {
    $name = htmlspecialchars($_POST['name']);
    if ($name === '') {
        $errors['name'] = NAME_REQUIRED;
    } else {
        $inputs['name'] = $name;
    }

} else {
    $errors['name'] = NAME_REQUIRED;
}


// sanitzie and validate email
if (filter_has_var(INPUT_POST, 'email')) {
    // sanitnize email first
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $inputs['email'] = $email;
    if ($email) {
        // validate email
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        // email is not valid
        if ($email === false) {
            $errors['email'] = EMAIL_INVALID;
        } 
    } else {
        $errors['email'] = EMAIL_REQUIRED;
    } 
    
} else {
    $errors['email'] = EMAIL_REQUIRED;
}

// the checkbox
if (filter_has_var(INPUT_POST, 'agree')) {
    $agree = trim($_POST['agree']);
    if ($agree === 'yes') {
        echo 'Thank you for joining us.';
    }
} else {
    $errors['agree'] = 'To join us, you need to agree to the TOS';
}

?>


<?php if (count($errors) === 0) : ?>
    <section>
        <h2>
            Thanks <?php echo htmlspecialchars($name) ?> for your subscription!
        </h2>
        <p>Please follow the steps below to complete your subscription:</p>
        <ol>
            <li>Check your email (<?php echo htmlspecialchars($email) ?>) - Find the message sent from webmaster@phptutorial.net</li>
            <li>Click to confirm - Click on the link in the email to confirm your subscription.</li>
        </ol>
    </section>

<?php endif ?>