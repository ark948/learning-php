<?php

function check_honeypot() {
    if (filter_has_var(INPUT_POST, 'honeypot')){
        $honeypot = trim($_POST['honeypot']);
        if ($honeypot) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            exit;
        }
    }
}


function validate() {

    $inputs = [];
    $errors = [];   

    // validate name
    if (filter_has_var(INPUT_POST, 'name')) {
        $inputs['name'] = trim($_POST['name']);
        if (trim($inputs['name']) === '') {
            $errors['name'] = 'Please enter your name';
        }    
    }

    // validate email
    if (filter_has_var(INPUT_POST, 'email')) {
        $inputs['email'] = trim($_POST['email']);
        // validate email
        if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        }
    } else {
        $errors['email'] = 'Please enter your address';
    }


    // validate subject
    if (filter_has_var(INPUT_POST, 'subject')) {
        $inputs['subject'] = trim($_POST['subject']);
        if (trim($inputs['subject']) === '') {
            $errors['subject'] = 'Please enter a subject';
        }    
    } else{
        $errors['subject'] = 'Please enter a subject';
    }

    // validate message
    if (filter_has_var(INPUT_POST, 'message')) {
        $inputs['message'] = trim($_POST['message']);
        if (trim($inputs['message']) === '') {
            $errors['message'] = 'Please enter a message';
        }    
    } else {
        $errors['message'] = 'Please enter a message';
    }

    return [$inputs, $errors];
}

function send_email($from_email, $message, $subject, $recipient_email) {
    // Email header
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';
    $headers[] = "To: $recipient_email";
    $headers[] = "From: $from_email";
    $header = implode('\r\n', $headers);

    // send email
    mail($recipient_email, $subject, $message, $header);
}