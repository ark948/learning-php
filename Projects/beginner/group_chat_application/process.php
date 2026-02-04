<?php

if (isset($_POST['submit'])) {
    $link = require_once 'db_connect.php';

    // check the connection
    if ($link === false) {
        die("ERROR: Could not connect to database. ".mysqli_connect_error());
    }

    // Escape user inputs for security
    $un = mysqli_real_escape_string($link, $_REQUEST['uname']);
    $m = mysqli_real_escape_string($link, $_REQUEST['msg']);

    date_default_timezone_set('Asia/Kolkata');
    $ts=date('y-m-d h:ia');

    $sql = "INSERT INTO chats (uname, msg, dt) VALUES ('$n', '$m', '$ts')";
    if (mysqli_query($link, $sql)) {
        ;
    } else {
        echo "ERROR: Message was not sent.";
    }

    mysqli_close($link);
}