<?php

require "../autoload.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");

use App\Controllers\PostsController;

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $post = json_decode(json: file_get_contents(filename: "php://input"));
    $id = $post->id;
    $id = filter_var(value: $id, filter: FILTER_VALIDATE_INT);
    
    if (!$id) {
        http_response_code(404);
        echo json_encode([
            "status" => false, 
            "message" => "there was an error."
        ]);
        exit();
    }

    $updatePost = new PostsController();

    $data = [
        "title" => $post->title,
        "body" => $post->body,
        "author" => $post->author
    ];

        // validate required fields
    foreach ($data as $key => $value) {
        if (empty($valid)) {
            echo json_encode(['status' => false, 'message' => "$key is required."]);
            exit();
        }
    }

    if ($updatePost->update($data, $id)): // if the return value was true...
        http_response_code(200);
        echo json_encode([
            "status" => true,
            "message" => "Post was updated.",
            "data" => $data
        ]);
    else:
        http_response_code(500);
        echo json_encode([
            "status" => false,
            "message" => "error, Post was not updated.",
        ]);
    endif;
} else {
    http_response_code(405);
    echo json_encode([
        "status" => false,
        "message" => "Only PUT method is allowed.",
    ]);
}