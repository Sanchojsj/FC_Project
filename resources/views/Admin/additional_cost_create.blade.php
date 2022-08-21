@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Añadir Gasto Adicional</h3></div>
                    <div class="card-body">
                        <form action="/additional_cost_post" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Nombre del Gasto Adicional</label>
                                        <input class="form-control py-4" name="additional_cost_name" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="price">Precio</label>
                                        <input class="form-control py-4" name="price" type="text" placeholder="" />
                                    </div>
                                </div>
                                <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="Digite la descripcion del Insumo ..."></Textarea>
                            </div>

                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Enviar</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection