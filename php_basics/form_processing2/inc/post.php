<?php

if (filter_has_var(INPUT_POST, 'contact')) {
	$contact = trim($_POST['contact']);

	// check the selected value against the original values
    // we check if $contact exists and is a key of $contacts array
	if ($contact && array_key_exists($contact, $contacts)) {
		$contact = htmlspecialchars($contact);
	} else {
		$errors['contact'] = 'Please select at least an option.';
	}

	if (count($errors)) {
        // if any error existed, re-render the get.php again
		require __DIR__ .  '/get.php';
	} else {
        // this is the confirmation message
		echo <<<html
		You selected to be contacted via <strong> $contact</strong>.
		<a href="index.php">Back to the form</a>
		html;
	}
}


// aquire and process (clean) the select element
if (filter_has_var(INPUT_POST, 'color')) { // checking the POST request to get the element with color as name
	$color = htmlspecialchars($_POST['color']); // if exists, aquire it and escape it
} else {
	$color = null;
}
?>

<?php if ($color): ?>
    <p>You selected <span style="color:<?= $color ?>"><?= $color ?></span></p>
	<p><a href="index.php">Back to the form</a></p>
<?php else: ?>
	<p>You did not select any color</p>
<?php endif ?>
