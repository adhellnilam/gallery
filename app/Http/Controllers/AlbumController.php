<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function profile() {
        $albums = Album::get();

        return view('profile')->with('albums', $albums);
    }

    public function index() {

        return view('albums.index');
    }

    public function create() {
        return view('albums.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image',
        ]);

        $filenameWithExtention = $request->file('cover_image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME);

        $extention = $request->file('cover_image')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extention;

        $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->datecreated = now();
        $album->cover_image = $filenameToStore;
        $album->user_id = auth()->user()->id;
        $album->save();

        return redirect('/profile')->with('success', 'Album created successfuly!');
    }

    public function show($id) {
        $album = Album::with('posts')->find($id);

        return view('albums.show')->with('album', $album);
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        // Pastikan album milik user yang sedang login
        if ($album->user_id === auth()->id()) {
            // Hapus cover image dari storage
            Storage::delete('/public/storage/album_covers/'.$album->cover_image);
            // Hapus album dari database
            $album->delete();
            return redirect()->back()->with('success', 'Album deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }

}
