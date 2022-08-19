@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Productos en Inventario <a href="/create" class="btn btn-sm btn-primary">Añadir nueva Prueba</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Portada</th>
                    <th>Acciones</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($posts as $post)
                 <tr>
                       <th scope="row">{{ $post->id }}</th>
                       <td>{{ $post->title }}</td>
                       <td>{{ $post->author }}</td>
                       <td>{{ $post->body }}</td>
                       <td><img src="cover/{{ $post->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                       <td><a href="/read/{{ $post->id }}" class="btn btn-sm btn-success">ver</a>
                           <a href="/edit/{{ $post->id }}" class="btn btn-sm btn-info">editar</a></td>
                       <td>
                           <form action="/delete/{{ $post->id }}" method="post">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Seguro de Eliminar?');" type="submit">Eliminar</button>
                            @csrf
                            @method('delete')
                           </form>
                       </td>

                   </tr>
                   @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        
<script>
   


   $('#dataTable').DataTable({
    columnDefs: [
    {bSortable: false, targets: [6]} 
  ],
                dom: 'lBfrtip',
           buttons: [
               {
                   extend: 'copyHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                       columns: [ 0, ':visible' ]
                       
                   }
               },
               {
                   extend: 'excelHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                    columns: [ 0, ':visible' ]
                   }
               },
               {
                   extend: 'pdfHtml5',
                   exportOptions: {
                    modifier: {
                        page: 'current'
                    },
                       columns: [ 0, 1, 2, 5 ]
                   }
               },
               'colvis'
           ]
           });
       </script>
@endsection