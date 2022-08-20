@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Actividades <a href="/activity_create" class="btn btn-sm btn-primary">Añadir nueva actividad</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Fecha de Realizacion</th>
                        <th>Valor</th>
                        <th>Fase</th>
                        <th>Descripcion</th>
                        <th>Portada</th>
                        <th>Acciones</th>
                        <th>Eliminar</th>
                        
                    </tr>
                </thead>
                <tbody>
                	@foreach($activities as $activity)
                    <tr>
                        <th scope="row">{{ $activity->id }}</th>
                        <td>{{ $activity->activity_code }}</td>
                        <td>{{ $activity->activity_name }}</td>
                        <td>{{ $activity->realization_date }}</td>
                        
                        @if($activity->value > '0')
                            <td>{{ $activity->value }}</td>
                        @else
                            <td>No hay terreno</td>
                        @endif

                        <td>{{ $activity->type_phase }}</td>
                        <td>{{ $activity->body }}</td>
                        <td><img src="cover/{{ $activity->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                        <td><a href="/activity_edit/{{ $activity->id }}" class="btn btn-sm btn-info">editar</a>
                            <a href="/activity_ver/{{ $activity->id }}" class="btn btn-sm btn-success">ver mas</a></td>
                        <td>
                                <form action="/delete/{{ $activity->id }}" method="post">
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