@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ver Cultivo</h3></div>
                    <div class="card-body">
                        <div class="form-row">


                        <div class="col-lg-3">
                            <p>Portada:</p>
                            <img src="/cover/{{ $crops->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            <form action="/deletecover/{{ $crops->id }}" method="post">
                            @csrf
                            @method('delete')
                            </form>
                            <br>
        
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                        <form action="/crop_read/{{ $crops->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Codigo del Cultivo</label>
                                    <input class="form-control py-4" name="crop_code" type="text" placeholder="" value="{{ $crops->crop_code }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nombre del Cultivo</label>
                                    <input class="form-control py-4" name="crop_name" type="text" placeholder="" value="{{ $crops->crop_code }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="start_date">Fecha Inicio</label>
                                    <input class="form-control py-4" name="start_date" type="date" placeholder="" value="{{ $crops->start_date }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="finish_date">Fecha Entrega</label>
                                    <input class="form-control py-4" name="finish_date" type="date" placeholder="" value="{{ $crops->finish_date}}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="land_area">Area del Terreno</label>
                                    <input class="form-control py-4" name="land_area" type="text" placeholder="" value="{{ $crops->land_area}}" readonly/>
                                </div>
                            </div>
                            <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body" readonly>{{ $crops->body }}</Textarea>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="type_phase">Tipo de fase</label>
                                    <div class="form-check">
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                               type="radio" name="type_phase" id="type_phase" value="Antes" disabled>
                                        <label class="form-check-label inline-block text-gray-800" for="type_phase">
                                            Antes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                               type="radio" name="type_phase" id="type_phase" value="Durante" disabled>
                                        <label class="form-check-label inline-block text-gray-800" for="type_phase">
                                            Durante
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                               type="radio" name="type_phase" id="type_phase" value="Despues" disabled>
                                        <label class="form-check-label inline-block text-gray-800" for="type_phase">
                                            Despues
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="type_crop">Tipo de Cultivo</label>
                                    <div class="form-check">
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                               type="radio" name="type_crop" id="type_crop" value="Perenne" disabled>
                                        <label class="form-check-label inline-block text-gray-800" for="type_crop">
                                            Perenne
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                               type="radio" name="type_crop" id="type_crop" value="Ciclo Corto" disabled>
                                        <label class="form-check-label inline-block text-gray-800" for="type_crop">
                                            Ciclo Corto
                                        </label>
                                    </div>
                                </div>
                            </div>
                                                  <label class="m-2">Imagen de Portada</label>
                         <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="cover" readonly>

                         <!--<label class="m-2">Imagenes</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images_crops[]" multiple>-->

                        <td>
                            <a href="/crop_index" class="btn btn-primary mt-3">Volver</a></td>
                        <td>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection