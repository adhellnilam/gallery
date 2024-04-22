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

        return view('adminHome', compact('loggedInUsersCount', 'userPostsCount', 'userAlbumsCount', 'posts', 'albums'));
    }

    public function deleteUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('adminHome')->with('success', 'User deleted successfully');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('userEdit', compact('user'));
    }

    public function updated(Request $request)
    {
        $user = auth()->user();
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'address' => 'required|string|max:255',
        ]);
    
        $user->update($validatedData);
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }    
}
