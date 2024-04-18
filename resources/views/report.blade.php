@extends('layouts.app')

@section('content')
   <section class="text-center container">
      <div class="row py-lg-5">
         <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="user">{{ Auth::user()->name }}</h1>
            <h5 class="email">{{ Auth::user()->email }}</h5>
         </div>
      </div>
   </section>

   <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">All Count</div>
              <div class="card-body">
               <table class="table table-bordered tab">
                  <thead>
                  <tr>
                     <th scope="col">Count Post</th>
                     <th scope="col">Count Album</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <td>{{ $userPostsCount }}</td>
                     <td>{{ $userAlbumsCount }}</td>
                  </tr>
                  {{-- <tr>
                     <td><button type="button" class="btn btn-outline-secondary">Secondary</button></td>
                     <td><button type="button" class="btn btn-outline-secondary">Secondary</button></td>      
                  </tr> --}}
                  </tbody>
               </table>
              </div>
          </div>
      </div>
   </div>

   <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Your Posts</div>
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Upload Date</th>
                              <th scope="col">Cover</th>
                              <th scope="col">Album</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($posts as $post)
                              <tr>
                                  <th scope="row">{{ $loop->iteration }}</th>
                                  <td>{{ $post->title }}</td>
                                  <td>{{ $post->description }}</td>
                                  <td>{{ $post->uploaddate }}</td>
                                  <td><img src="{{ asset('images/' . $post->cover) }}" alt="Cover" style="max-width: 100px;"></td>
                                  <td>{{ $post->album->name }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
   </div>

   <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Your Albums</div>
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Date Created</th>
                              <th scope="col">Cover Image</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($albums as $album)
                              <tr>
                                  <th scope="row">{{ $loop->iteration }}</th>
                                  <td>{{ $album->name }}</td>
                                  <td>{{ $album->description }}</td>
                                  <td>{{ $album->datecreated }}</td>
                                  <td><img src="{{ asset('storage/album_covers/' . $album->cover_image) }}" alt="Cover" style="max-width: 100px;"></td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

   {{-- <div>
      <h2>Jumlah User yang Login: {{ $loggedInUsersCount }}</h2>
      <h2>Jumlah Post Foto yang Dibuat oleh User: {{ $userPostsCount }}</h2>
      <h2>Jumlah Album yang Dibuat oleh User: {{ $userAlbumsCount }}</h2>
  </div>   --}}
@endsection