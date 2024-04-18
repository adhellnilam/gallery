<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('home')->with('posts', $posts);

        // compact('galleries')
    }

    public function profile()
    {
        return view('profile');
    }

    public function hapus($id)
    {
        $photo = Post::findOrFail($id);
        if ($photo->user_id == auth()->user()->id) {
            $photo->delete();
        }
        return redirect('home')->with('success', 'Post deleted successfully.');
    }
}
