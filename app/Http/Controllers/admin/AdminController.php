<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_panel()
    {
        $user = User::get();

        return view("admin.panel" , [
            "users" => $user
        ]);
    }
}
