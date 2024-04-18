@extends('layouts.app')

@section('content')
   <div class="container">
      <img src="{{ asset('img/sparkle.png') }}" alt="Logo" class="spark1">

      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card" style="border-radius: 5px; box-shadow: 2px 2px 3px 1px rgba(0, 0, 0, 0.263); padding: 35px; background-color: white;">
               <h3 class="apa">{{ $photo->title }}</h3>
               <p class="apa1">{{ $photo->description }}</p>

               <div class="fill">
                  <a href="{{ route('posts.edit', $photo->id) }}" class="btn btn-success" style="margin-right: 5px">
                     <i class="fas fa-edit"></i>
                 </a>

                  @if ($photo->user_id === auth()->id())
                     <form action="{{ route('photo-hapus', $photo->id) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" name="button" class="btn btn-danger" style="float: right;"><i class="fas fa-trash"></i></button>
                     </form>
                  @endif

                  <a href="{{ route('album-show', $photo->album->id )}}" class="btn back">Go Back</a>
               </div>

               <small style="color: #48423F;">By: {{ $photo->user->name }}</small>
               <hr>
                  <img src="{{ asset('images/'. $photo->cover) }}" alt="{{ $photo->cover }}">
               <hr>
            </div>
         </div>
      </div>
   </div>
@endsection