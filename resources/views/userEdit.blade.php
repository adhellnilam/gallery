@extends('layouts.app')

@section('content')
<img src="{{ asset('img/lines.png') }}" alt="Logo" class="lines">
<img src="{{ asset('img/curve.png') }}" alt="Logo" class="curve">

   <div class="row justify-content-center" style="margin-top: -30px">
      <div class="col-md-8">
         <div class="card" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.263); border-color: #00000014;">
            <div class="card-header">Edit Profil</div>
            <div class="card-body">
               <form action="{{ route('profile.update') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name">Name</label>
                           <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                        </div>
                     </div>             
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="address">Address</label>
                           <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                        </div>
                     </div>
                  </div>
                  
                     <br>
                     <div class="button">
                        <a href="{{ route('home') }}" class="btn btn4">Cancel</a>
                        <button type="submit" class="btn btn3">Update Profile</button>
                     </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
