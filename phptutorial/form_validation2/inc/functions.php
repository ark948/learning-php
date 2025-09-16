<?php

function checked($needle, $haystack)
{
	if ($haystack) {
		return in_array($needle, $haystack) ? 'checked' : '';
	}

	return '';
}


// We’ll use this checked() function to refill the selected checkboxes on the form.
