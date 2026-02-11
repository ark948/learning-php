<?php


require "connection.php";

// $insert = $conn->query(
//     "INSERT INTO posts (title, body) 
//      VALUES ('post three', 'body three')"
// );


// it is advisable not to use queries
// use prepared statements instead


// in some cases, data to insert are not known, or are to be aquired later
// in those cases we use prepared statements

$title = "title 4";
$body = "body of post 4";

$insert = $conn->prepare(
    "INSERT INTO posts (title, body) VALUES (:title, :body)"
);

// now bind the handlers (or execute and bind at once)
$insert->execute(array(
    ':title' => $title,
    ':body' => $body
));


// a similar syntax is to ? in place of handlers
// then we no longer need to provide index names
// query: "INSERT INTO posts (title, body) VALUES (?, ?)"
// $insert->execute(array($title, $body));