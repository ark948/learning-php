<?php

    try {
        $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        // if no database is specified, an exception is thrown

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected Successfully';
    } catch(PDOException $e) {
        echo 'Connection failed: '. $e->getMessage();
    }
