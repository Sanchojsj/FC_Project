@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ver Producto</h3></div>
                    <div class="card-body">
                        <div class="form-row">


                <div class="col-lg-3">
                    <p>Portada:</p>
                    <form action="/deletecover/{{ $posts->id }}" method="post">
                    @csrf
                    @method('delete')
                    </form>
                    <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                    <br>



                     @if (count($posts->images)>0)
                     <p>Imagenes:</p>
                     @foreach ($posts->images as $img)
                     <form action="/deleteimage/{{ $img->id }}" method="post">
                         @csrf
                         @method('delete')
                         </form>
                     <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                     @endforeach
                     @endif

                </div>


                <div class="col-lg-6">
				    <div class="form-group">
                        <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                         <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}" readonly>
        				 <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}" readonly>
                         <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body" readonly>{{ $posts->body }}</Textarea>
                         <label class="m-2">Imagen de Portada</label>
                         <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="cover" readonly>

                         <label class="m-2">Imagenes</label>
                         <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="images[]" multiple readonly>
                        
                        <td>
                            <a href="/index" class="btn btn-primary mt-3">Volver</a></td>
                        <td>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection








