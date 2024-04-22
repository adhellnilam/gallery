<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    // public function likeCount()
    // {
    //     // Mendapatkan total likes dari stored procedure
    //     $likes = DB::select('CALL CalculateLikes()');

    //     // Format hasil dari stored procedure agar sesuai dengan struktur yang diharapkan dalam view
    //     $likesCounts = [];
    //     foreach ($likes as $like) {
    //         $likesCounts[$like->post_id] = $like->total_likes;
    //     }

    //     return view('home', compact('likesCounts'));
    // }
}
