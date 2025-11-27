<?php


// if...else statement executes a code block when a condition is true or another code block when the condition is false

$is_authenticated = false;

if ( $is_authenticated ) {
    echo 'Welcome!';
} else {
    echo 'You are not authorized to access this page.';
}

// if...else statement can mix with HTML nicely

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP if Statement Demo</title>
</head>
<body>
  <?php $is_authenticated = true; ?>
  <?php if ($is_authenticated) : ?>
    <a href="#">Logout</a>
  <?php else: ?>
    <a href="#">Login</a> 
    <!-- endif does not need a semicolon, since it is the last statement in php block -->
  <?php endif ?>
</body>
</html>