<?php

if (filter_has_var(INPUT_POST, 'colors')) {
	
	$selected_colors = array_map('htmlspecialchars', $_POST['colors']);
} else {
	$selected_colors = null;
}

?>

<?php if ($selected_colors) : ?>
	<p>You selected the following colors:</p>
	<ul>
		<?php foreach ($selected_colors as $color) : ?>
			<li style="color:<?= $color ?>"><?= $color ?></li>
		<?php endforeach ?>
	</ul>
	<p>

	</p>

<?php else : ?>
	<p>You did not select any color.</p>
<?php endif ?>
<a href="index.php">Back to the form</a>