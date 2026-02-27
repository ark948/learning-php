<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

// do not use Illuminate\Support\Facades\View for type hinting of controller methods

class PostsController extends Controller
{
    public function home(): View {
        $name = "Blog Post App";
        $posts = [
            "post1" => "post 1 title",
            "post2" => "post 2 title"
        ];
        return view("home", data: compact('name', 'posts'));
    }

    public function allPosts(): View {
        $post = "some post";
        $age = 18;
        return view(view: 'posts', data: [
            'post' => $post,
            'age' => $age
        ]);
    }

    public function singlePost($id) {
        return "post id is: " . $id;
    }
}
