@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Lista de Gastos Adicionales <a href="/additional_cost_create" class="btn btn-sm btn-primary">Añadir Gasto Adicional</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($additional_costs as $additional_cost)
                    <tr>
                        <th scope="row">{{ $additional_cost->id }}</th>
                        <td>{{ $additional_cost->additional_cost_name }}</td>
                        
                        @if($additional_cost->price> '0')
                            <td>{{ $additional_cost->price}}</td>
                        @else
                            <td>Sin precio disponible</td>
                        @endif
                        <td>{{ $additional_cost->body }}</td>
                        <td><a href="/additional_cost_edit/{{ $additional_cost->id }}" class="btn btn-sm btn-info">editar</a>
                            <a href="/additional_cost_ver/{{ $additional_cost->id }}" class="btn btn-sm btn-success">ver mas</a></td>
                        <td>
                                <form action="/delete/{{ $additional_cost->id }}" method="post">
                                 <button class="btn btn-sm btn-danger" onclick="return confirm('Seguro de Eliminar?');" type="submit">Eliminar</button>
                                 @csrf
                                 @method('delete')
                                </form>
                        </td>
                        <td>
                            
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