@extends('layouts.nav')

@section('content')
   <div class="row justify-content-center" style="margin-top: -30px">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">Album Table</div>
            <div class="card-body">
               <table id="example2" class="display nowrap" style="width:100%">
                  <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Name</th>
                         <th scope="col">Description</th>
                         <th scope="col">Date Created</th>
                         <th scope="col">Cover Image</th>
                         <th scope="col">User</th>
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
                        </tr>
                        @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <th scope="col">#</th>
                         <th scope="col">Name</th>
                         <th scope="col">Description</th>
                         <th scope="col">Date Created</th>
                         <th scope="col">Cover Image</th>
                         <th scope="col">User</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>

   <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

   <script>
      new DataTable('#example2', {
         layout: {
             topStart: {
                 buttons: ['csv', 'excel', 'pdf']
             }
         }
     });
   </script>
@endsection
