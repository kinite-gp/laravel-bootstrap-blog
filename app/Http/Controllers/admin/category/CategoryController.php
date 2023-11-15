<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view("admin.categories.list", [
            "categories" => $categories,
        ]);
    }

    public function list_deleted()
    {
        $categories = Category::onlyTrashed()->get();
        return view("admin.categories.list_deleted",[
            "categories" => $categories,
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
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
        $request->validate([
            "title" => ["required", "max:100"],
            "description" => ["required", "max:500"],
            "icon" => ["required"]
        ]);

        Category::create([
            "title" => $request->title,
            "description" => $request->description,
            "icon" => $request->icon,
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
        $category = $request->validate([
            "title" => ["required", "max:100"],
            "description" => ["required", "max:500"],
            "icon" => ["required"]
        ]);

        $c = Category::find($id);
        $c->update([
            "title" => $category["title"],
            "description" => $category["description"],
            "icon" => $category["icon"]
        ]);
        return redirect(route("admin_panel"));
    }
}
