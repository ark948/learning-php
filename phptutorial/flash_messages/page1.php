<?php

session_start();

require __DIR__ . '/inc/flash.php';
require __DIR__ . '/inc/header.php';

// we create a flash message in this file, and display on the second page
// open page1 file on browser, and click on the anchor link below to go to the second page
flash('greeting', 'Hi there', FLASH_INFO);

echo '<a href="page2.php" title="Go To Page 2">Go To Page 2</a>';

require __DIR__ . '/inc/footer.php';