<?php

if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['inputs'], $_SESSION['errors'])) {
    $error_message = $_SESSION['error_message'];
    $errors = $_SESSION['errors'];
    $inputs = $_SESSION['inputs'];
    unset($_SESSION['errors'], $_SESSION['inputs'], $_SESSION['error_message']);
}