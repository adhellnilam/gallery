<?php

namespace App\Http\Controllers;

use App\Exports\PhotoExport;
use App\Models\Album;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostExport;

class PostsController extends Controller
{
    public function create()
    {
        // Mendapatkan album yang dimiliki oleh user yang sedang login
        $albums = Album::where('user_id', auth()->user()->id)->get();

        return view('postsCreate', compact('albums'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required|exists:albums,id',
        ]);

        $imageName = time() . '.' . $request->cover->extension();

        $request->cover->move(public_path('images'), $imageName);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'uploaddate' => now(),
            'cover' => $imageName,
            'album_id' => $request->album_id,
            'user_id' => auth()->user()->id, // Assuming user is authenticated
        ]);

        return redirect('home')->with('success', 'Post created successfully.');
    }

    public function like($id)
    {
        $post = Post::find($id);
        $like = $post->likes()->where('user_id', auth()->user()->id)->first();

        if ($like) {
            $like->delete(); // Unlike jika sudah melakukan like sebelumnya
        } else {
            $post->likes()->create([
                'user_id' => auth()->user()->id,
                'likedate' => now(),
            ]);
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id == auth()->user()->id) {
            $post->delete();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $albums = Album::all(); // Jika Anda membutuhkan daftar album untuk dropdown
        return view('postsEdit', compact('post', 'albums'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
    
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'album_id' => 'required',
        ]);

        // Simpan data lama gambar
        $oldCover = $post->cover;

        // Update data post
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->album_id = $request->input('album_id');

        // Proses update cover jika ada file baru yang diunggah
        if ($request->hasFile('cover')) {
            $imageName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images'), $imageName);
            $post->cover = $imageName;

            // Hapus gambar lama
            if ($oldCover && file_exists(public_path('images/' . $oldCover))) {
                unlink(public_path('images/' . $oldCover));
            }
        }

        $post->save();

        return redirect()->route('home')->with('success', 'Post updated successfully.');
    }

    public function show($id) {
        $photo = Post::findOrFail($id);
        return view('photos.show', ['photo' => $photo]);
    }

    public function downloadImage($id)
    {
        $post = Post::find($id);
        if ($post) {
            $pathToFile = public_path('images/' . $post->cover);
            return response()->download($pathToFile);
        } else {
            abort(404);
        }
    }


    // public function show($id) {
    //     $post = Post::find($id);

    //     return view('photos.show')->with('posts', $post);
    // }

    // public function store(){
    //     $post = New Post;
    //     $post->title = $request->title;
    //     $post->description = $request->description;
    //     $post->user_id = auth()->id();
    //     $post->album_id = auth()->id();

    //     if($request->hasFile('cover')){
    //         $file $request->file('cover');
    //         $fileName = time().'.'.$file->getClientOriginalExtention();
    //         $destionationPath = public_path('/images');
    //         $file->move($destionationPath, $fileName);
    //         $post->cover = $fileName;
    //     }

    //     $post ->save();
    //     return back();
    // } 
}
