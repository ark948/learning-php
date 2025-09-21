<?php
    $pdo = new PDO("mysql:host=localhost;dbname=pawzone", "wrongadmin", "ABCD");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);