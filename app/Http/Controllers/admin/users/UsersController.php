<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view("admin.users.list", [
            "users" => $users,
        ]);
    }

    public function list_deleted()
    {
        $users = User::onlyTrashed()->get();
        return view("admin.users.list_deleted",[
            "users" => $users,
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route("admin_user_list"));
    }

    public function real_delete($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        return redirect(route("admin_user_list"));
    }

    public function recover_user($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect(route("admin_user_list"));
    }
}
