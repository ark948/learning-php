<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    echo htmlspecialchars($email);
}