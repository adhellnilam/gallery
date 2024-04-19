
@extends('layouts.app')

@section('content')
   <table id="example2" class="display nowrap" style="width:100%">
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
      <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Upload Date</th>
            <th scope="col">Cover</th>
            <th scope="col">Album</th>
          </tr>
      </tfoot>
   </table>

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
                 buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
             }
         }
     });
   </script>
@endsection
