<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function dashboard()
    {
        return redirect('/');
    }
}
