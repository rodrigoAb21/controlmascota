@extends('layouts.index')
@section('contenido')
    <h3 class="pb-2">
        Editar desparacitación
    </h3>
    <form method="POST" action="{{url('mascotas/'.$mascota_id.'/desparasitaciones/'.$desparasitacion->id)}}" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$desparasitacion->nombre}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de desparasitación*</label>
            <input class="form-control" type="date" name="fecha_vacuna" value="{{$desparasitacion->fecha_vacuna}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Próxima desparasitación</label>
            <input class="form-control" type="date" name="fecha_validez" value="{{$desparasitacion->fecha_validez}}">
        </div>

        <a href="{{url('mascotas/'.$mascota_id.'/desparasitaciones')}}" class="btn btn-warning">Atrás</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
