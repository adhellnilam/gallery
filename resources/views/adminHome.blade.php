@extends('layouts.nav')

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
                     <th scope="col">Count User</th>
                     <th scope="col">Count Post</th>
                     <th scope="col">Count Album</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <td>{{ $totalUserCount }}</td>
                     <td>{{ $totalPostsCount }}</td>
                     <td>{{ $totalAlbumsCount }}</td>
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
            <div class="card-header">Table User</div>
               <div class="card-body">
                  <table class="table table-bordered text-center">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Address</th>
                           {{-- <th scope="col">Action</th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($users as $user)
                           <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->address }}</td>
                              {{-- <td>
                                    <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: inline-block;">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                              </td> --}}
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
            <div class="card-header">Table User Post</div>
               <div class="card-body">
                  <table class="table table-bordered text-center">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Title</th>
                           <th scope="col">Description</th>
                           <th scope="col">Upload Date</th>
                           <th scope="col">Cover</th>
                           <th scope="col">Album</th>
                           <th scope="col">User</th>
                           <th scope="col">Likes Count</th>
                           <th scope="col">Action</th>
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
                           <td>{{ $post->user->name }}</td>
                           <td>{{ $likesCounts[$post->id] }}</td>
                           <td>
                                 <form action="{{ route('deletePost', $post->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                 </form>
                           </td>
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
              <div class="card-header">Table User Album</div>
              <div class="card-body">
                  <table class="table table-bordered text-center">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Date Created</th>
                              <th scope="col">Cover Image</th>
                              <th scope="col">User</th>
                              <th scope="col">Action</th>

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
                              <td>{{ $album->user->name }}</td>
                              <td>
                                 <form action="{{ route('deleteAlbum', $post->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                 </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@endsection