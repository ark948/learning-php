<?php

$config = require_once __DIR__ . '/../config/app.php';

// Check honeypot
check_honeypot();

// Validate inputs
[$inputs, $errors] = validate();

if (empty($errors)) {
    // Send email
    $from_email = $inputs['email'];
    $subject = $inputs['subject'];
    $message = nl2br(htmlspecialchars($inputs['message']));
    send_email($from_email, $message, $subject, $config['mail']['to_email']);

    $_SESSION['success_message'] = 'Thanks for contacting us! We will be in touch with you shortly.';
} else {
    $_SESSION['error_message'] = 'Please fix the following errors';
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $inputs;
}

header('Location: ' . $_SERVER['PHP_SELF'], true, 303);
exit;