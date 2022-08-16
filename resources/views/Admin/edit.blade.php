@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Producto</h3></div>
                    <div class="card-body">
                        <div class="form-row">


                <div class="col-lg-3">
                    <p>Portada:</p>
                    <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                    <form action="/deletecover/{{ $posts->id }}" method="post">
                    <button class="btn text-danger">X Eliminar</button>
                    @csrf
                    @method('delete')
                    </form>
                    <br>



                     @if (count($posts->images)>0)
                     <p>Imagenes:</p>
                     @foreach ($posts->images as $img)
                     <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                     <form action="/deleteimage/{{ $img->id }}" method="post">
                         <button class="btn text-danger">X Eliminar</button>
                         @csrf
                         @method('delete')
                         </form>
                     @endforeach
                     @endif

                </div>


                <div class="col-lg-6">
				    <div class="form-group">
                        <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                         <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}">
        				 <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}">
                         <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body">{{ $posts->body }}</Textarea>
                         <label class="m-2">Imagen de Portada</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                         <label class="m-2">Imagenes</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>

                        <button type="submit" class="btn btn-danger mt-3 ">Enviar</button>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection








