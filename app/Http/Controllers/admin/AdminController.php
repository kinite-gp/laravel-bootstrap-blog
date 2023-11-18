<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_panel()
    {
        $user = User::get();
        $category = Category::get();
        $post = Post::get();

        return view("admin.panel" , [
            "users" => $user,
            "categories" => $category,
            "post" => $post,
        ]);
    }
}
