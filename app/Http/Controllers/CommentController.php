<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request, Blog $blog, Comment $comment)
    {

        $comment->content = $request->content;
        $comment->blog_id = $blog->id;
        $comment->user_id = auth()->user();
        $comment->save();

        return redirect()->back()->with('success', 'Комментарий добавлен!');
    }
}
