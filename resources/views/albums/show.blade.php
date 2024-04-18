@extends('layouts.app')

@section('content')
   <section class="text-center container">
      <div class="row py-lg-5">
         <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="apa">{{ $album->name }}</h1>
            <p class="apa1">{{ $album->description }}</p>
            <p>
               <a href="{{ route('posts')}}" class="btn btn-primary my-2 upl" >Upload Photo</a>
               <a href="{{ route('profile')}}" class="btn btn-secondary my-2">Go Back</a>
            </p>
         </div>
      </div>
   </section><br>

   @if (count($album->posts) > 0)
      <div class="container">
      
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
              @foreach ($album->posts as $photo)
                  @if ($photo->album_id == $album->id && $photo->user_id == auth()->id())
                      <div class="col">
                          <div class="card shadow-sm">
                              <img src="{{ asset('images/' . $photo->cover) }}" alt="{{ $photo->cover }}">
                              <div class="card-body">
                                  <p class="card-text">{{ $photo->title }}</p>
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div class="btn-group">
                                          <a href="{{ route('photo-show', $photo->id )}}" class="btn btn-sm btn-outline-secondary">View</a>
                                      </div>
                                      <small class="text-body-secondary">{{ $photo->user->name }}</small>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endif
              @endforeach
          </div>
      </div>
   @else
      <h3>No photo yet.</h3>   
   @endif

@endsection
