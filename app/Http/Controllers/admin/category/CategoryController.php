<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\admin\post\PostController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view("admin.layouts.list", [
            "title" => "category",
            "items" => $categories,
        ]);
    }

    public function list_deleted()
    {
        $categories = Category::onlyTrashed()->get();
        return view("admin.layouts.list_deleted",[
            "title" => "category",
            "items" => $categories,
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $posts = Post::where("category_id", $id)->get();

        foreach ($posts as $post)
        {
            $post = Post::find($post->id);
            $post->delete();
        }

        $category->delete();
        return redirect(route("admin_category_list"));
    }

    public function real_delete($id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();
        return redirect(route("admin_category_list"));
    }

    public function recover_user($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return redirect(route("admin_category_list"));
    }

    public function more($id)
    {
        $category = Category::find($id);
        return view("admin.categories.more",[
            "category" => $category,
        ]);
    }

    public function add_get()
    {
        return view("admin.categories.add");
    }

    public function add_post(Request $request)
    {
        $validatedData = $request->validate([
            "title" => ["required", "max:100"],
            "description" => ["required", "max:500"],
            "icon" => ["required"]
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData->errors());
        }

        Category::create([
            "title" => $validatedData->title,
            "description" => $validatedData->description,
            "icon" => $validatedData->icon,
        ]);

        return redirect(route("admin_panel"));

    }

    public function edit_get($id)
    {
        $category = Category::find($id);
        return view("admin.categories.edit",[
            "category" => $category,
        ]);
    }

    public function edit_post(Request $request, $id)
    {
        $validatedData = $request->validate([
            "title" => ["required", "max:100"],
            "description" => ["required", "max:500"],
            "icon" => ["required"]
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData->errors());
        }

        $c = Category::find($id);
        $c->update([
            "title" => $validatedData["title"],
            "description" => $validatedData["description"],
            "icon" => $validatedData["icon"]
        ]);
        return redirect(route("admin_panel"));
    }
}
