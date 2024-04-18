<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back();
    }

}
