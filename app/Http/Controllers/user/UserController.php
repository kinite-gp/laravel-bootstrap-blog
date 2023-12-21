<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_panel()
    {
        // count(\App\Models\User::find(auth()->user()->id)->posts
        $posts = count(\App\Models\User::find(auth()->user()->id)->posts);
        $comments = count(\App\Models\User::find(auth()->user()->id)->comments);

        $yposts = Post::paginate(2);

        return view("user.panel" , [
            "posts" => $posts,
            "comments" => $comments,
            "items" => $yposts,
        ]);
    }
}
