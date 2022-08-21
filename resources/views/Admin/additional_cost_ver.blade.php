@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Gasto Adicional</h3></div>
                    <div class="card-body">
                        
                            <div class="form-group">
                        <form action="/additional_cost_update/{{ $additional_costs->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nombre del Insumo</label>
                                    <input class="form-control py-4" name="additional_cost_name" type="text" placeholder="" value="{{ $additional_costs->additional_cost_name }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="price">Precio</label>
                                    <input class="form-control py-4" name="price" type="text" placeholder="" value="{{ $additional_costs->price}}" readonly/>
                                </div>
                            </div>
                        <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body" readonly>{{ $additional_costs->body }}</Textarea>

                        <td>
                            <a href="/additional_cost_index" class="btn btn-primary mt-3">Volver</a></td>
                        <td>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
