@extends('layouts.admin_master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Pedidos Entregados
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id del Pedido</th>
                        <th>Codigo de Producto</th>
                        <th>Nombre de Producto</th>
                        <th>Email del Cliente</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($orders as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->product_code }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>
                            @if($row->order_status=='0')
                                <a href="#" class="btn btn-sm btn-info">Pendinente</a>
                            @else
                                <a href="#" class="btn btn-sm btn-info">Entregado</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                
            </table>
        </div>
    </div>
</div>



@endsection