<?php

namespace App\Http\Controllers\admin\post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::paginate(20);
        return view("admin.layouts.list", [
            "title" => "post",
            "items" => $posts,
        ]);
    }

    public function list_deleted()
    {
        $posts = Post::onlyTrashed()->paginate(20);
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
        $validator = Validator::make($request->all(), [
            "title" => ["required", "max:100"],
            "body" => ["required"],
            "category_id" => ["required"]
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        Post::create([
            "user_id" => Auth::id(),
            "title" => $request->input("title"),
            "body" => $request->input("body"),
            "category_id" => $request->input("category_id")
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


        $post = Post::find($id);
        $post->update([
            "title" => $request->input("title"),
            "description" => $request->input("description"),
            "icon" => $request->input("icon"),
        ]);

        return redirect(route("admin_panel"));
    }

}
