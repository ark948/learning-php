<?php


// to send mail, you use the mail() function

// On Linux or Unix systems, you can configure the mail() function to use the sednmail or Qmail program to send messages.
// On Windows, you can install the sendmail and set the sendmail_path in php.ini file to point at the executable file.

// an SMTP server is required
// this lesson is temporarily skipped

$to      = 'contact@phptutorial.net';
$subject = 'This is a test email';
$message = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>

    <h1>This is HTML mail</h1>

</body>

</html>';


$headers = [
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=utf8',
    'From' => 'john.doe@example.com',
    'Reply-To' => 'john.doe@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
];


if (mail($to, $subject, $message,  $headers)) {
    echo 'email was sent.';
} else {
    echo 'An error occurred.';
}