<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function show(Request $request, Blog $blog)
    {

        $sort = $request->sort;

        if ($sort == 'latest') {
            $comments = $blog->comments()
                ->orderBy('created_at', 'desc')
                ->paginate(7);
        } else {
            $comments = $blog->comments()->paginate(7);
        }

        return view('blog.show', [
            'blog' => $blog,
            'comments' => $comments
        ]);

    }

}
