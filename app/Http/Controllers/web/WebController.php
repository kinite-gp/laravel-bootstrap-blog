<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function about()
    {
        return view("web.about");
    }

    public function faqs()
    {
        return "FAQs";
    }

    public function rules()
    {
        return "Rules";
    }

    public function allposts()
    {
        return "all posts";
    }

    public function post($id)
    {
        $post = Post::find($id);

        return view("web.post" , [
            "post" => $post
        ]);
    }
}
