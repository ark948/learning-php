<?php


class MyDB extends SQLite3
{
    public function __construct(){
        $this->open('db.sqlite');
    }
}

$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
    echo "Error";
} else {
    echo "Database opened successfully\n";
}