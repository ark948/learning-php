<?php

require "../autoload.php";

header("Content-Type: application/json");

use App\Models\Post;

$allPosts = Post::getAllPosts();

$arr = [];
$arr["data"] = [];

if (!empty($allPosts)) {
    foreach($allPosts as $post) {
        $post_item = [
            "id" => $post['id'],
            "title" => $post['title'],
            "body" => $post['body'],
            "author" => $post['author'],
            "created_at" => $post['created_at'],
        ];

        $arr["data"][] = $post_item;
    }
    http_response_code(200);
    echo json_encode(value: $arr);
} else {
    echo json_encode(value: [
        "data" => [],
        "message" => "no posts yet.",
    ]);
}