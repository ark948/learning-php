<?php

require "../autoload.php";

header("Content-Type: application/json");

use App\Models\Post;

// get id from GET request and validate it
$id = filter_input(type: INPUT_GET, var_name: "id", filter: FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    echo json_encode([
        "status" => false, 
        "message" => "there was an error."
    ]);
    exit();
}

$post = Post::getSinglePost($id);
if ($post) {
    http_response_code(200);
    echo json_encode([
        "status" => true,
        "post" => $post
    ]);
} else {
    http_response_code(404);
    echo json_encode([
        "status" => false,
        "message" => "no posts with given id."
    ]);
}

