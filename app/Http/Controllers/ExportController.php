<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Post;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $posts = Post::with('album', 'user')->where('user_id', auth()->user()->id)->get();
        $albums = Album::where('user_id', auth()->user()->id)->get();

        return view('export', compact('posts', 'albums'));
    }

    public function tampilan()
    {
        $posts = Post::with('album', 'user')->where('user_id', auth()->user()->id)->get();
        $albums = Album::where('user_id', auth()->user()->id)->get();

        return view('export1', compact('posts', 'albums'));
    }
}
