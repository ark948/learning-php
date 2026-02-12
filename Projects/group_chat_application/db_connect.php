<?php

$servername = "localhost";
$username = "project_tester";
$password = '123';
$database = "chat_app_db";
function connect_through_PDO($host, $db, $user, $password)
{
	$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

	try {
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		$pdo = new PDO($dsn, $user, $password, $options);
		if ($pdo) {
			echo "Connection ok" . PHP_EOL;
			return $pdo;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

function connect_through_mysqli($host, $user, $password, $db): bool|mysqli {
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable error reporting OR handle it manually
    $conn = mysqli_connect($host, $user, $password, $db);
    if (mysqli_connect_errno()) {
        throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
    }

    return $conn;
}

$conn = connect_through_mysqli(
    host: $servername,
    db: $database,
    user: $username,
    password: $password
);

// check if database connections is successfully established
if ($conn) {
    echo '<script>console.log("Database connection OK");</script>';
} else {
    die("There was a problem connecting to database.");
}

return $conn;