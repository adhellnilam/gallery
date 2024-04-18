@extends('layouts.app')

@section('content')
<br><br>
<img src="{{ asset('img/lines.png') }}" alt="Logo" class="lines">
<img src="{{ asset('img/curve.png') }}" alt="Logo" class="curve">

    <div class="row justify-content-center" style="margin-top: -30px">
      <div class="col-md-8">
         <div class="card" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.263); border-color: #00000014;">
            <div class="card-header">Create New Album</div>
            <div class="card-body">
               <form action="{{ route('album-store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                     </div>
                     <div class="col-md-6">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter description">
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-12">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                     </div>
                  </div>
                  <br>
                  <div class="button">
                     <a href="{{ route('home') }}" class="btn btn4">Cancel</a>
                     <button class="btn btn3" value="Upload" type="submit">Create Album</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
    </div>


   {{-- <div class="container">
      <div class="row justify-content-center" style="margin-top: -30px">
         <div class="col-md-8">
            <div class="card" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.263); border-color: #00000014;">
               <div class="card-header">Create new album</div>
               <div class="card-body">
                  <form method="POST" action="{{ route('album-store') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                     </div>
                     <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter description">
                     </div>
                     <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                     </div><br>
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
@endsection