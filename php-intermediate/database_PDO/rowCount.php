<?php

require_once "connection.php";

$data = $conn->query("SELECT * FROM posts LIMIT 20");
print($data->rowCount());

// a common check
if ($data->rowCount() > 0) {
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        echo $row['title'] . PHP_EOL;
    }
} else {
    echo "no reuslts yet." . PHP_EOL;
}