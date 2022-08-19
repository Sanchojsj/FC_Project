@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Añadir nuevo producto</h3></div>
                    <div class="card-body">
                        <form action="/post" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Titulo</label>
                                        <input class="form-control py-4" name="title" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Autor</label>
                                        <input class="form-control py-4" name="author" type="text" placeholder="" />
                                    </div>
                                </div>
                                <label class="small mb-1" for="inputFirstName">Descripcion</label>
                                <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="..."></Textarea>
                                <label class="m-2">Imagen de Portada</label>
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">
       
                                <label class="m-2">Imagenes</label>
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>


                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Enviar</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection










