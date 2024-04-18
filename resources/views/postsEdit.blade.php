@extends('layouts.app')

@section('content')
<img src="{{ asset('img/lines.png') }}" alt="Logo" class="lines">
<img src="{{ asset('img/curve.png') }}" alt="Logo" class="curve">

   <div class="row justify-content-center" style="margin-top: -30px">
      <div class="col-md-8">
         <div class="card" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.263); border-color: #00000014;">
            <div class="card-header">Edit Image</div>
            <div class="card-body">
               <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="album_id">Image Album</label>
                           <select name="album_id" class="form-control">
                                 @foreach($albums as $album)
                                    <option value="{{ $album->id }}" {{ $album->id == $post->album_id ? 'selected' : '' }}>
                                       {{ $album->name }}
                                    </option>
                                 @endforeach
                           </select>
                        </div>
                     </div>             
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="cover">Image Cover</label>
                           <input type="file" name="cover" class="form-control">
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="title">Image Title</label>
                           <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="description">Image Description</label>
                           <textarea name="description" class="form-control">{{ $post->description }}</textarea>
                        </div>
                     </div>
                  </div>
                  
                     <br>
                     <div class="button">
                        <a href="{{ route('home') }}" class="btn btn4">Cancel</a>
                        <button type="submit" class="btn btn3">Update Image</button>
                     </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   {{-- <div class="card">
      <div class="card-header">Edit Post</div>
         <div class="card-body">
               <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                     <label for="album_id">Image Album</label>
                     <select name="album_id" class="form-control">
                           @foreach($albums as $album)
                              <option value="{{ $album->id }}" {{ $album->id == $post->album_id ? 'selected' : '' }}>
                                 {{ $album->name }}
                              </option>
                           @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="cover">Image Cover</label>
                     <input type="file" name="cover" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="title">Image Title</label>
                     <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="description">Image Description</label>
                     <textarea name="description" class="form-control">{{ $post->description }}</textarea>
                  </div>
                  <br>
                     <div class="button">
                        <button type="submit" class="btn btn3">Update Post</button>
                     <a href="{{ route('home') }}" class="btn btn4">Cancel</a>
                     </div>
               </form>
         </div>
   </div> --}}
@endsection
