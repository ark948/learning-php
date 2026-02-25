<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Post {
    public static function getAllPosts(): mixed {
        $pdo = Database::connect();
        $allPosts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $allPosts->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSinglePost(int $id): mixed {
        $pdo = Database::connect();
        $singlePost = $pdo->prepare("SELECT * FROM posts WHERE id=?");
        $singlePost->execute([$id]);
        return $singlePost->fetch(PDO::FETCH_ASSOC);
    }

    public static function createPost(string $title, string $body, string $author): mixed {
        $pdo = Database::connect();
        $createPost = $pdo->prepare(query: "INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)");
        return $createPost->execute(params: [":title" => $title, ":body" => $body, ":author" => $author]);
    }

    public static function updatePost(string $title, string $body, string $author, int $id): mixed {
        $pdo = Database::connect();
        $updatePost = $pdo->prepare(query: "UPDATE posts SET title=?, body=?, author=? WHERE id=?");
        return $updatePost->execute(params: [
            $title,
            $body,
            $author,
            $id
        ]);
    }

    public static function deletePost(int $id): mixed {
        $pdo = Database::connect();
        $deletePost = $pdo->prepare("DELETE FROM posts WHERE id=?");
        return $deletePost->execute([
            $id
        ]);
    }
}