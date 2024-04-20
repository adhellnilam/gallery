<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user yang login (hanya satu user yang login pada saat itu)
        $loggedInUsersCount = Auth::check() ? 1 : 0;

        // Mendapatkan semua post foto
        $posts = Post::with('album', 'user')->get();
        $totalPostsCount = $posts->count();

        // Mendapatkan semua album
        $albums = Album::with('user')->get();
        $totalAlbumsCount = $albums->count();

        // Mendapatkan semua user
        $users = User::all();
        $totalUserCount = $users->count();

        return view('adminHome', compact('loggedInUsersCount', 'totalPostsCount', 'totalUserCount', 'totalAlbumsCount', 'posts', 'albums', 'users'));
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        // Lakukan sesuatu dengan $post, misalnya tampilkan form edit
        return view('admin.edit-post', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        // Update atribut lainnya sesuai kebutuhan

        $post->save();

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully');
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('adminHome')->with('success', 'Post deleted successfully');
    }
}
