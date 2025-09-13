<?php

// this is a dump and die function

if (!function_exists('d')) {
	function dd($data)
	{
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
		die();
	}
}