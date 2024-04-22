@extends('layouts.app')

@section('content')
<div class="one">
    <section class="text-center container">
        <div class="row py-lg-5">
           <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="user">{{ Auth::user()->name }}</h1>
              <h5 class="email">{{ Auth::user()->email }}</h5>
              <h5 class="address">{{ Auth::user()->address }}</h5>
              <a href="{{ route('userEdit')}}" class="btn btn-primary my-2 upl" >Edit Profile</a>
           </div>
        </div>
    </section><br>

    <div class="container">
        @if ($albums->where('user_id', auth()->id())->isEmpty())
            <div class="text-center">
                <h5 class="yet">You don't have album yet, create new one!!</h5>
                <a href="{{ route('index') }}" class="btn btnaja">Create Album</a>
            </div>
        @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($albums as $album)
                    @if ($album->user_id === auth()->id())
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/album_covers/'.$album->cover_image) }}" alt="{{ $album->cover_image }}">
                            <div class="card-body">
                                <p class="card-text">{{ $album->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('album-show', $album->id )}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-body-secondary">{{ $album->name }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>

<style>
      .album-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        grid-gap: 20px;
    }

    .album {
        background-color: #E6A349;
        border: 1px solid #ffffff;
        overflow: hidden;
    }

    .album-thumbnail {
        height: 200px;
        background-color: #E6A349;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .album-thumbnail a {
        text-decoration: none;
        color: #E6A349;
        background-color: #ffffff;
        border-color: #ffffff;
    }
</style>

@endsection
