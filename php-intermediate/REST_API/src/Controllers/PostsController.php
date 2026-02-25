<?php

namespace App\Controllers;
use App\Models\Post;

class PostsController
{
    public function store($data) {
        $title = trim(htmlspecialchars($_POST['title']));
        $body = trim(htmlspecialchars($_POST['body']));
        $author = trim(htmlspecialchars($_POST['author']));

        if ($title AND $body AND $author) {
            $inserted = Post::createPost($title, $body, $author);
            if ($inserted):
                return true;
            else:
                return false;
            endif;
        }
    }

    public function update($data, $id) {
        $title = trim(htmlspecialchars($_POST['title']));
        $body = trim(htmlspecialchars($_POST['body']));
        $author = trim(htmlspecialchars($_POST['author']));

        if ($title AND $body AND $author) {
            $updated = Post::updatePost($title, $body, $author, $id);
            if ($updated):
                return true;
            else:
                return false;
            endif;
        }
    }
}