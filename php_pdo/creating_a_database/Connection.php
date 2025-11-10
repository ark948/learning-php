<?php


require_once 'config.php';

class Connection
{
    public static function make($host, $db, $user, $password)
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
}


return Connection::make($host, $db, $user, $password);

