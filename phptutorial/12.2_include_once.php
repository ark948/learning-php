<?php


// sometimes some files get included more than once by accident
// this causes errors in some cases such as with function definitions
// since functions cannot be defined more than once

// to make sure files are only included once:
// use include_once statement

include_once 'functions.php';
include_once 'functions.php';

// include_once will only include the file once,
// even if it is repeated, (in this case it will return true)

