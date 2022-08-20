@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Actividad</h3></div>
                    <div class="card-body">
                        <div class="form-row">


                        <div class="col-lg-3">
                            <p>Portada:</p>
                            <img src="/cover/{{ $activities->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            <form action="/deletecover/{{ $activities->id }}" method="post">
                            @csrf
                            @method('delete')
                            </form>
                            <br>

                            @if (count($activities->activity_images)>0)
                            <p>Imagenes:</p>
                            @foreach ($activities->activity_images as $img)
                            <img src="/activity_images/{{ $img->activity_image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                            <form action="/deleteactivity_image/{{ $img->id }}" method="post">
                                @csrf
                                @method('delete')
                                </form>
                            @endforeach
                            @endif
        
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                        <form action="/activity_update/{{ $activities->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="code">Codigo de la Actividad</label>
                                    <input class="form-control py-4" name="activity_code" type="text" placeholder="" value="{{ $activities->activity_code }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nombre de la Actividad</label>
                                    <input class="form-control py-4" name="activity_name" type="text" placeholder="" value="{{ $activities->activity_code }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="realization_date">Fecha Realizacion</label>
                                    <input class="form-control py-4" name="realization_date" type="date" placeholder="" value="{{ $activities->realization_date }}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="value">Valor</label>
                                    <input class="form-control py-4" name="value" type="text" placeholder="" value="{{ $activities->value}}" readonly/>
                                </div>
                            </div>
                            <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body" readonly >{{ $activities->body }}</Textarea>
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
                            
                            <label class="m-2">Imagen de Portada</label>
                            <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="cover" readonly>
   
                            <label class="m-2">Imagenes</label>
                            <input type="file" id="formFileDisabled" disabled class="form-control m-2" name="activity_images[]" multiple readonly>

                        <td>
                            <a href="/activity_index" class="btn btn-primary mt-3">Volver</a></td>
                        <td>

                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection