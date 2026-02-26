<?php

require "../autoload.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
// Access-Control-Allow-Methods: Specifies one or more HTTP request methods allowed when accessing a resource
// Access-Control-Allow-Methods: POST indicates that this endpoint accepts POST method

// by default, browsers send a preflight request (OPTIONS request) to check what is allowed.
// if you're backend only accepts POST, you must declare it. Otherwise the browser will block the frontend call.

// Since frontend may be on another domain (CORS needs to be configured properly)

use App\Controllers\PostsController;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $createNewPost = new PostsController();
    $post = json_decode(json: file_get_contents(filename: "php://input"));
    $data = [
        "title" => $post->title,
        "body" => $post->body,
        "author" => $post->author
    ];

    if ($createNewPost->store($data)): // if the return value was true...
        http_response_code(201);
        echo json_encode([
            "status" => true,
            "message" => "Post was created. OK",
            "data" => $data
        ]);
    else:
        http_response_code(500);
        echo json_encode([
            "status" => false,
            "message" => "error, Post was not created",
        ]);
    endif;
}