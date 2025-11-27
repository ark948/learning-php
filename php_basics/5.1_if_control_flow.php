<?php

// if statement allows for execution of a piece of code if an expression evaluates to true

$is_admin = true;
if ($is_admin)
    echo 'Welcome, admin';

// if need to execute mulitple lines of code use curly braces

$can_edit = false;
$is_admin = true;

if ( $is_admin ) {
   echo 'Welcome, admin!';
   $can_edit = true;
}

// It’s a good practice to always use curly braces even though it has a single statement to execute

// if statements can be nested
$is_admin = true;
$can_approve = true;

if ($is_admin) {
	echo 'Welcome, admin!';
	if ($can_approve) {
		echo 'Please approve the pending items';
	}
}

// if statement can be embedded in html

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP if Statement Demo</title>
</head>
<body>
  <?php $is_admin = true; ?>
  <?php if ( $is_admin ) : ?>
    <a href="#">Edit</a>
  <?php endif; ?>
    <a href="#">View</a> 
</body>
</html>