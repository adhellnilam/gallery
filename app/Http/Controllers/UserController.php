<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user yang login (hanya satu user yang login pada saat itu)
        $loggedInUsersCount = Auth::check() ? 1 : 0;

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan jumlah post foto yang dibuat oleh user
        $userPostsCount = $user->posts->count();

        // Mendapatkan jumlah album yang dibuat oleh user
        $userAlbumsCount = $user->albums->count();

        $posts = Post::with('album', 'user')->where('user_id', auth()->user()->id)->get();
        $albums = Album::where('user_id', auth()->user()->id)->get();

        return view('report', compact('loggedInUsersCount', 'userPostsCount', 'userAlbumsCount', 'posts', 'albums'));
    }
}
