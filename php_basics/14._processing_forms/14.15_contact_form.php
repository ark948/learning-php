<?php

// we'll buiid a contact form in this lesson

// this lesson will go through subjects such as validating fields and sending email responses

// The contact form is a target for spammers who use spambots to send unsolicited messages for advertising, phishing, spreading malware, etc

// A spambot is software that automates the spam activities like filling out and submitting contact forms automatically

// To build a spam-free contact form, you can add a captcha to it. 
// Sometimes, captchas are very difficult to read. Hence, they do not create a good experience for legitimate users

// To avoid using a captcha while protecting the contact form from spam, you can use a honeypot to trick spambots

// A honeypot is a field on the form that the visitor cannot see, but spambots can. 
// When a spambot sees the honeypot field, it fills the field with a value.

// In PHP, you can check if the honeypot has a value and skip sending the message

// To create a honeypot, you need to have a CSS class that completely hide the honeypot field as follows:
// .user-cannot-see {
//     display:none
// }


// and the honeypot field
/*

<label for="nickname" aria-hidden="true" class="user-cannot-see"> Nickname
    <input type="text" 
           name="nickname" 
           id="nickname" 
           class="user-cannot-see" 
           autocomplete="off" 
           tabindex="-1">
</label>

*/

// Note that the name of the honeypot should look legitimate. Recently, the spambot has become smarter that can detect the honeypot.

// To deal with these smart spambots, you need a smart honeypot. 
// e.g. a smart honeypot may have a different name for each request. Additionally, its location on the form is changed randomly.

// We’ll build a contact form as shown in the following picture:

//     The contact form has the following features:
    
//     Form validation
//     Sending message via email.
//     Prevent spam using the honeypot technique.
//     Prevent double submit.

// here is the full example of contact form



// Organized code project example -> contact_form



session_start();

function check_honeypot(){
    // check the honeypot
    if(filter_has_var(INPUT_POST, 'honeypot')){
        $honeypot = trim($_POST['honeypot']);
        if ($honeypot) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            exit;
        }
    }
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

function validate() {

    $inputs = [];
    $errors = [];   

    // validate name
    if(filter_has_var(INPUT_POST, 'name')) {
        $inputs['name'] = trim($_POST['name']);
        if (trim($inputs['name']) === '') {
            $errors['name'] = 'Please enter your name';
        }    
    }

    // validate email
    if(filter_has_var(INPUT_POST, 'email')) {
        $inputs['email'] = trim($_POST['email']);
        // validate email
        if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        }
    } else {
        $errors['email'] = 'Please enter your address';
    }


    // validate subject
    if(filter_has_var(INPUT_POST, 'subject')) {
        $inputs['subject'] = trim($_POST['subject']);
        if (trim($inputs['subject']) === '') {
            $errors['subject'] = 'Please enter a subject';
        }    
    } else{
        $errors['subject'] = 'Please enter a subject';
    }

    // validate message
    if(filter_has_var(INPUT_POST, 'message')) {
        $inputs['message'] = trim($_POST['message']);
        if (trim($inputs['message']) === '') {
            $errors['message'] = 'Please enter a message';
        }    
    } else {
        $errors['message'] = 'Please enter a message';
    }

    return [$inputs, $errors];
}


$request_method = $_SERVER['REQUEST_METHOD'];


if($request_method === 'POST') {
   
    $config = [
        'mail' => [
            'to_email' => 'webmaster@phptutorial.net'
        ]
    ];

    // check honeypot
    check_honeypot();

    // validate inputs
    [$inputs, $errors] = validate();

    if(empty($errors)) {
        // send email
        $from_email = $inputs['email'];
        $subject = $inputs['subject'];
        $message = nl2br(htmlspecialchars($inputs['message']));
        
        send_email($from_email, $message, $subject, $config['mail']['to_email']);

        // success message
        $_SESSION['success_message'] =  'Thanks for contacting us! We will be in touch with you shortly.';

    } else {

        $_SESSION['error_message'] =  'Please fix the following errors';
        $_SESSION['errors'] =   $errors;
        $_SESSION['inputs'] =   $inputs;
        
    }

    header('Location: ' . $_SERVER['PHP_SELF'], true, 303);
    exit;   
    

} if($request_method === 'GET') {

    if (isset($_SESSION['success_message'])) {
        $success_message = $_SESSION['success_message'];
        unset($_SESSION['success_message']);

    } elseif (isset($_SESSION['inputs'],$_SESSION['errors'])) {
        $error_message = $_SESSION['error_message'];
        $errors = $_SESSION['errors'];
        $inputs = $_SESSION['inputs'];
        unset($_SESSION['errors'], $_SESSION['inputs'], $_SESSION['error_message']);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Contact Form</title>
</head>
<body>
    <main>
        <?php if (isset($success_message)) : ?>
        <div class="alert alert-success">
            <?= $success_message ?>
        </div>
        <?php endif ?>

         <?php if (isset($error_message)) : ?>
        <div class="alert alert-error">
            <?= $error_message ?>
        </div>
        <?php endif ?>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <header>
                <h1>Send Us a Message</h1>
            </header>

            <div>
                <label for="name">Name:</label>
                <input type="text" value="<?= $inputs['name'] ?? '' ?>" name="name" id="name" placeholder="Full name">
                <small><?= $errors['name'] ?? '' ?></small>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" placeholder="Email address">
                <small><?= $errors['email'] ?? '' ?></small>
            </div>

            <div>
                <label for="subject">Subject:</label>
                <input type="subject" name="subject" id="subject" value="<?= $inputs['subject'] ?? '' ?>" placeholder="Enter a subject">
                <small><?= $errors['subject'] ?? '' ?></small>
            </div>

            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5"><?= $inputs['message'] ?? '' ?></textarea>
                <small><?= $errors['message'] ?? '' ?></small>
            </div>

            <label for="nickname" aria-hidden="true" class="user-cannot-see"> Nickname
                <input type="text" name="nickname" id="nickname" class="user-cannot-see" tabindex="-1" autocomplete="off">
            </label>

            <button type="submit">Send Message</button>
        </form>
    </main>
</body>
</html>