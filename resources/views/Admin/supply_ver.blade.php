@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Insumo</h3></div>
                    <div class="card-body">
                        <div class="form-row">


                        <div class="col-lg-3">
                            <p>Portada:</p>
                            <img src="/cover/{{ $supplies->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            <form action="/deletecover/{{ $supplies->id }}" method="post">
                            @csrf
                            @method('delete')
                            </form>
                            <br>

                            @if (count($supplies->supply_images)>0)
                            <p>Imagenes:</p>
                            @foreach ($supplies->supply_images as $img)
                            <img src="/supply_images/{{ $img->supply_image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                @csrf
                                @method('delete')
                                </form>
                            @endforeach
                            @endif
        
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                        <form action="/supply_update/{{ $supplies->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="code">Codigo del Insumo</label>
                                    <input class="form-control py-4" name="supply_code" type="text" placeholder="" value="{{ $supplies->supply_code }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nombre del Insumo</label>
                                    <input class="form-control py-4" name="supply_name" type="text" placeholder="" value="{{ $supplies->supply_name }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="price">Precio</label>
                                    <input class="form-control py-4" name="price" type="text" placeholder="" value="{{ $supplies->price}}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="amount">Cantidad</label>
                                    <input class="form-control py-4" name="amount" type="text" placeholder="" value="{{ $supplies->amount}}" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="expiration_date">Fecha de Vencimiento</label>
                                    <input class="form-control py-4" name="expiration_date" type="date" placeholder="" value="{{ $supplies->expiration_date}}" readonly/>
                                </div>
                            </div>

                        <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body" readonly>{{ $supplies->body }}</Textarea>

                        <label class="m-2">Imagen de Portada</label>
                         <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="cover" readonly>

                         <label class="m-2">Imagenes</label>
                         <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="crop_images[]" multiple readonly>

                        <td>
                            <a href="/supply_index" class="btn btn-primary mt-3">Volver</a></td>
                        <td>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
