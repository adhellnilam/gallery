<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $posts = Post::with('album', 'user')->get();
        $albums = Album::with('user')->get();

        return view('export', compact('posts', 'albums'));
    }

    public function tampilan()
    {
        $posts = Post::with('album', 'user')->get();
        $albums = Album::with('user')->get();

        return view('export1', compact('posts', 'albums'));
    }

    public function display()
    {
        $users = User::all();

        return view('export2', compact('users'));
    }
}
