@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Añadir nueva Actividad</h3></div>
                    <div class="card-body">
                        <form action="/activity_post" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="code">Codigo de la Actividad</label>
                                        <input class="form-control py-4" name="activity_code" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Nombre de la Actividad</label>
                                        <input class="form-control py-4" name="activity_name" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="start_date">Fecha de Realizacion</label>
                                        <input class="form-control py-4" name="realization_date" type="date" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="land_area">Valor</label>
                                        <input class="form-control py-4" name="value" type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="type_phase">Tipo de fase</label>
                                        <div class="form-check">
                                            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                                   type="radio" name="type_phase" id="type_phase" value="Antes">
                                            <label class="form-check-label inline-block text-gray-800" for="type_phase">
                                                Antes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                                   type="radio" name="type_phase" id="type_phase" value="Durante">
                                            <label class="form-check-label inline-block text-gray-800" for="type_phase">
                                                Durante
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                                                   type="radio" name="type_phase" id="type_phase" value="Despues">
                                            <label class="form-check-label inline-block text-gray-800" for="type_phase">
                                                Despues
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="Digite la descripcion de la Actividad ..."></Textarea>
                                
                                <label class="m-2">Imagen de portada</label>
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">
       
                                <label class="m-2">Imagenes</label>
                                <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="activity_images[]" multiple>

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Gallery</label>
                                        <input name="photo" type="file" />
                                    </div>
                                </div> -->
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