@extends('layouts.app')
@section('content')
<img src="{{ asset('img/lines.png') }}" alt="Logo" class="lines">
<img src="{{ asset('img/curve.png') }}" alt="Logo" class="curve">

    <div class="row justify-content-center" style="margin-top: -30px">
      <div class="col-md-8">
         <div class="card" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.263); border-color: #00000014;">
            <div class="card-header">Upload New Image</div>
            <div class="card-body">
               <form action="{{ route('posts') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <label for="album" class="album">Image Album</label>
                        <select name="album_id" class="form-control">
                           @foreach($albums as $album)
                              @if($album->user_id == auth()->user()->id)
                                <option value="{{ $album->id }}">{{ $album->name }}</option>
                              @endif
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-6">
                        <label for="cover" class="cover">Image Cover</label>
                        <input type="file" name="cover" class="form-control">
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label for="title" class="desc">Image Title</label>
                        <input type="text" placeholder="Input Title" name="title" class="form-control">
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label for="description" class="desc">Image Description</label>
                        <textarea name="description" placeholder="Input Description" rows="3" class="form-control"></textarea>
                     </div>
                  </div>
                  <br>
                  <div class="button">
                     <a href="{{ route('home') }}" class="btn btn4">Cancel</a>
                     <button class="btn btn3" value="Upload" type="submit">Upload Image</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
    </div>
@endsection