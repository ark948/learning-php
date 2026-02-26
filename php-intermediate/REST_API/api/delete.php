<?php

require "../autoload.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

use App\Models\Post;

$id = filter_input(type: INPUT_GET, var_name: "id", filter: FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(404);
    echo json_encode([
        "status" => false, 
        "message" => "there was an error."
    ]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $post = Post::getSinglePost($id);
    if ($post) {
        $deleted = Post::deletePost($id);
        if ($deleted):
            http_response_code(200);
            echo json_encode([
                "status" => true,
                "message" => "Post deleted successfully",
            ]);
        endif;
    } else {
        http_response_code(404);
        echo json_encode([
            "status" => false,
            "message" => "No posts with given id."
        ]);
    }
}

