@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Cultivos en Inventario <a href="/crop_create" class="btn btn-sm btn-primary">Añadir nuevo cultivo</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Codigo Cultivo</th>
                        <th>Nombre</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Entrega</th>
                        <th>Area del Terreno</th>
                        <th>Fase</th>
                        <th>Tipo de Cultivo</th>
                        <th>Descripcion</th>
                        <th>Portada</th>
                        <th>Acciones</th>
                        <th>Eliminar</th>
                        
                    </tr>
                </thead>
                <tbody>
                	@foreach($crops as $crop)
                    <tr>
                        <th scope="row">{{ $crop->id }}</th>
                        <td>{{ $crop->crop_code }}</td>
                        <td>{{ $crop->crop_name }}</td>
                        <td>{{ $crop->start_date }}</td>
                        <td>{{ $crop->finish_date }}</td>
                        
                        @if($crop->land_area > '0')
                            <td>{{ $crop->land_area }}</td>
                        @else
                            <td>No hay terreno</td>
                        @endif

                        <td>{{ $crop->type_phase }}</td>
                        <td>{{ $crop->type_crop }}</td>
                        <td>{{ $crop->body }}</td>
                        <td><img src="cover/{{ $crop->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                        <td><a href="/crop_edit/{{ $crop->id }}" class="btn btn-sm btn-info">editar</a>
                            <a href="/crop_ver/{{ $crop->id }}" class="btn btn-sm btn-success">ver mas</a></td>
                        <td>
                                <form action="/delete/{{ $crop->id }}" method="post">
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