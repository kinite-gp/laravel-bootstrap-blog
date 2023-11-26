<?php

namespace App\Http\Controllers\admin\comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list()
    {
        $comments = Comment::all();
        return view("admin.layouts.list", [
            "title" => "comment",
            "items" => $comments,
        ]);
    }

    public function list_deleted()
    {
        $comments = Comment::onlyTrashed()->get();
        return view("admin.layouts.list_deleted",[
            "title" => "comment",
            "items" => $comments,
        ]);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect(route("admin_comment_list"));
    }

    public function real_delete($id)
    {
        Comment::onlyTrashed()->find($id)->forceDelete();
        return redirect(route("admin_comment_list"));
    }

    public function recover_user($id)
    {
        Comment::onlyTrashed()->find($id)->restore();
        return redirect(route("admin_comment_list"));
    }

    public function more($id)
    {
        $comment = Comment::withTrashed()->find($id);
        return view("admin.comments.more",[
            "comment" => $comment,
        ]);
    }



}
