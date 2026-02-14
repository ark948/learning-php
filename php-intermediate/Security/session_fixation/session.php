<?php

    session_start();

    // in browser's console:
    // type: document.cookie
    // you'll get PHPSESSID which is the session id

    // Generate a new id, after user logged in
    if ($logged) { // if user was logged in, ignore undefined error for now
        session_regenerate_id();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo session_id(); ?>
</body>
</html>