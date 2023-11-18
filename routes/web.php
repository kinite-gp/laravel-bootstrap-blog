<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

;

Route::get("/test",function () {
    $post = \App\Models\Post::find(1);

    return view("admin.test.test", [
        "post" => $post
    ]);
});


Route::prefix("/")->group(function (){
    Route::get('/', [\App\Http\Controllers\app\AppController::class, "home"])->name("home");
    Route::get('/dashboard', [\App\Http\Controllers\app\AppController::class, "dashboard"])->middleware(['auth', 'verified'])->name('dashboard');
    Route::group(['middleware' => ['auth',"admin_check"],'prefix' => '/panel/admin'], function () {
        Route::get("/", [\App\Http\Controllers\admin\AdminController::class, "admin_panel"])->name("admin_panel");
        Route::prefix("/user")->group(function (){
            Route::get("/all", [\App\Http\Controllers\admin\users\UsersController::class , "list"])->name("admin_user_list");
            Route::get("/all/deleted", [\App\Http\Controllers\admin\users\UsersController::class , "list_deleted"])->name("admin_deleted_user_list");
            Route::delete("/delete/{id}", [\App\Http\Controllers\admin\users\UsersController::class, "delete"]);
            Route::delete("/delete/force/{id}", [\App\Http\Controllers\admin\users\UsersController::class, "real_delete"]);
            Route::post("/recover/{id}", [\App\Http\Controllers\admin\users\UsersController::class , "recover_user"]);
            Route::get("/profile/{id}", [\App\Http\Controllers\admin\users\UsersController::class , "profile"]);
        });
        Route::prefix("/category")->group(function (){
            Route::get("/all", [\App\Http\Controllers\admin\category\CategoryController::class, "list"])->name("admin_category_list");
            Route::get("/all/deleted", [\App\Http\Controllers\admin\category\CategoryController::class , "list_deleted"])->name("admin_deleted_category_list");
            Route::delete("/delete/{id}", [\App\Http\Controllers\admin\category\CategoryController::class, "delete"]);
            Route::delete("/delete/force/{id}", [\App\Http\Controllers\admin\category\CategoryController::class, "real_delete"]);
            Route::post("/recover/{id}", [\App\Http\Controllers\admin\category\CategoryController::class , "recover_user"]);
            Route::get("/more/{id}", [\App\Http\Controllers\admin\category\CategoryController::class , "more"]);
            Route::get("/add", [\App\Http\Controllers\admin\category\CategoryController::class, "add_get"])->name("admin_category_add");
            Route::post("/add", [\App\Http\Controllers\admin\category\CategoryController::class, "add_post"]);
            Route::get("/edit/{id}", [\App\Http\Controllers\admin\category\CategoryController::class, "edit_get"]);
            Route::post("/edit/{id}", [\App\Http\Controllers\admin\category\CategoryController::class, "edit_post"]);
        });
        Route::prefix("/post")->group(function (){
            Route::get("/all", [\App\Http\Controllers\admin\post\PostController::class, "list"])->name("admin_post_list");
            Route::get("/all/deleted", [\App\Http\Controllers\admin\post\PostController::class , "list_deleted"])->name("admin_deleted_post_list");
            Route::delete("/delete/{id}", [\App\Http\Controllers\admin\post\PostController::class, "delete"]);
            Route::delete("/delete/force/{id}", [\App\Http\Controllers\admin\post\PostController::class, "real_delete"]);
            Route::post("/recover/{id}", [\App\Http\Controllers\admin\post\PostController::class , "recover_user"]);
            Route::get("/more/{id}", [\App\Http\Controllers\admin\post\PostController::class , "more"]);
            Route::get("/add", [\App\Http\Controllers\admin\post\PostController::class, "add_get"])->name("admin_post_add");
            Route::post("/add", [\App\Http\Controllers\admin\post\PostController::class, "add_post"]);
            Route::get("/edit/{id}", [\App\Http\Controllers\admin\post\PostController::class, "edit_get"]);
            Route::post("/edit/{id}", [\App\Http\Controllers\admin\post\PostController::class, "edit_post"]);
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
