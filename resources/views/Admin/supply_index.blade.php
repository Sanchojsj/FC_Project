@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Cultivos en Inventario <a href="/supply_create" class="btn btn-sm btn-primary">Añadir nuevo Insumo</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Codigo Insumo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Descripcion</th>
                        <th>Portada</th>
                        <th>Acciones</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($supplies as $supply)
                    <tr>
                        <th scope="row">{{ $supply->id }}</th>
                        <td>{{ $supply->supply_code }}</td>
                        <td>{{ $supply->supply_name }}</td>
                        
                        @if($supply->price> '0')
                            <td>{{ $supply->price}}</td>
                        @else
                            <td>Sin precio disponible</td>
                        @endif

                        @if($supply->amount > '0')
                            <td>{{ $supply->amount }}</td>
                        @else
                            <td>Insumo no disponible</td>
                        @endif

                        <td>{{ $supply->expiration_date }}</td>
                        <td>{{ $supply->body }}</td>
                        <td><img src="cover/{{ $supply->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                        <td><a href="/supply_edit/{{ $supply->id }}" class="btn btn-sm btn-info">editar</a>
                            <a href="/supply_ver/{{ $supply->id }}" class="btn btn-sm btn-success">ver mas</a></td>
                        <td>
                                <form action="/delete/{{ $supply->id }}" method="post">
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