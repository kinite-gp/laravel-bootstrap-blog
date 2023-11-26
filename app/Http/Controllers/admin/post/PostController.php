<?php

namespace App\Http\Controllers\admin\post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::all();
        return view("admin.layouts.list", [
            "title" => "post",
            "items" => $posts,
        ]);
    }

    public function list_deleted()
    {
        $posts = Post::onlyTrashed()->get();
        return view("admin.layouts.list_deleted",[
            "title" => "post",
            "items" => $posts,
        ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route("admin_post_list"));
    }

    public function real_delete($id)
    {
        Post::onlyTrashed()->find($id)->forceDelete();
        return redirect(route("admin_post_list"));
    }

    public function recover_user($id)
    {
        Post::onlyTrashed()->find($id)->restore();
        return redirect(route("admin_post_list"));
    }

    public function more($id)
    {
        $post = Post::withTrashed()->find($id);
        return view("admin.posts.more",[
            "post" => $post,
        ]);
    }

    public function add_get()
    {
        $categories = Category::all();
        return view("admin.posts.add",[
            "categories" => $categories
        ]);
    }

    public function add_post(Request $request)
    {
        $validatedData = $request->validate([
            "title" => ["required", "max:100"],
            "body" => ["required"],
            "category_id" => ["required"]
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData->errors());
        }

        Post::create([
            "user_id" => auth()->user()->id,
            "title" => $validatedData->title,
            "category_id" => $validatedData->category_id,
            "body" => $validatedData->body,
        ]);

        return redirect(route("admin_panel"));
    }

    public function edit_get($id)
    {
        $categories = Category::all();
        $post = Post::withTrashed()->find($id);
        return view("admin.posts.edit",[
            "post" => $post,
            "categories" => $categories
        ]);
    }

    public function edit_post(Request $request, $id)
    {
        $validatedData = $request->validate([
            "title" => ["required", "max:100"],
            "body" => ["required"],
            "category_id" => ["required"]
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData->errors());
        }

        $c = Post::find($id);
        $c->update([
            "user_id" => auth()->user()->id,
            "title" => $validatedData->title,
            "category_id" => $validatedData->category_id,
            "body" => $validatedData->body,
        ]);
        return redirect(route("admin_panel"));
    }
}
