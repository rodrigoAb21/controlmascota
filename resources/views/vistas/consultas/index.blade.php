@extends('layouts.index')
@section('contenido')
    <h2><i class="fa fa-stethoscope"></i> Consultas de "{{$mascota->nombre}}"</h2>
    @foreach($consultas as $consulta)
        <div class="card mb-3 mx-auto bg-gradient"
             style="max-width: 600px; background-color: #19317b; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <h2 class="card-title" style="color: #91d5f1">Consulta COD: {{$consulta->id}}</h2>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-clinic-medical me-1"></i> {{$consulta->veterinaria->nombre}}
                            </span><br>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-info-circle me-1"></i> {{$consulta->motivo}}
                            </span><br>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-coins"></i> Bs. {{$consulta->costo}} 
                            </span><br>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7">
                                <i class="fa fa-calendar-check me-1"></i>
                                {{Carbon\Carbon::createFromFormat('Y-m-d', $consulta->fecha_consulta)->isoFormat('DD MMMM YYYY')}}
                                ---
                                {{Carbon\Carbon::createFromFormat('Y-m-d', $consulta->fecha_control)->isoFormat('DD MMMM YYYY')}}
                            </span>
                        </div>
                        <div class="text-end">
                            <a href="{{url('mascotas/'.$mascota->id.'/consultas/'.$consulta->id)}}"
                               class="btn btn-light"><i class="fa fa-eye"></i></a>
                            <a href="{{url('mascotas/'.$mascota->id.'/consultas/'.$consulta->id.'/edit')}}"
                               class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger"
                                    onclick="modalEliminar('{{$consulta -> id}}', '{{url('mascotas/'.$mascota->id.'/consultas/'.$consulta -> id)}}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    <a href="{{url('mascotas/'.$mascota->id.'/consultas/create')}}" class="float2">
        <i class="fa fa-plus fa-2x my-float2"></i>
    </a>
    <a href="{{url('mascotas/'.$mascota->id)}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>

    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar consulta");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la consulta COD: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
