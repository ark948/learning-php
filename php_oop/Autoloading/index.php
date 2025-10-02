<?php

require_once 'functions.php';

$contact = new Contact('john.doe@example.com');

echo Email::send($contact); // Sending an email to john.doe@example.com