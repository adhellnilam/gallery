@extends('layouts.nav')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">Table user with stored procedure</div>
             <div class="card-body">
                <table class="table table-bordered text-center">
                   <thead>
                      <tr>
                         <th scope="col">#</th>
                         <th scope="col">Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">Address</th>
                      </tr>
                   </thead>
                   <tbody>
                      @foreach($users as $user)
                         <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                         </tr>
                      @endforeach
                   </tbody>
             </table>   
          </div>
       </div>
    </div>
 </div>
@endsection