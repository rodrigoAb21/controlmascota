@extends('layouts.index')
@section('contenido')
    <h2><i class="fa fa-paw"></i> Mascotas</h2>
    @foreach($mascotas as $mascota)
        <div class="card mb-3 mx-auto bg-gradient" style="max-width: 600px; background-color: #19317b; border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-11">
                        <h2 class="card-title" style="color: #91d5f1">{{$mascota->nombre}}</h2>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-paw me-1"></i> {{$mascota->tipo}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fa fa-birthday-cake me-1"></i>
                         {{
                            Carbon\Carbon::createFromFormat('Y-m-d', $mascota->fecha_nac)
                                ->isoFormat('DD MMMM YYYY')
                         }}
                        </span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fas fa-venus-mars me-1"></i> {{$mascota->sexo}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fas fa-dna me-1"></i> {{$mascota->raza}}</span>
                        </div>
                        <div class="mb-2">
                            <span class="card-text" style="color: #c7c7c7"><i class="fas fa-palette me-1"></i> {{$mascota->color}}</span>
                        </div>

                        <div class="text-end">
                            <a href="{{url('mascotas/'.$mascota->id)}}" class="btn btn-light"><i class="fa fa-eye"></i></a>
                            <a href="{{url('mascotas/'.$mascota->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$mascota -> nombre}}', '{{url('mascotas/'.$mascota -> id)}}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    <a href="{{url('mascotas/create')}}" class="float2">
        <i class="fa fa-plus fa-2x my-float2"></i>
    </a>
    <a href="{{url('/')}}" class="float">
        <i class="fa fa-arrow-left fa-2x my-float"></i>
    </a>

    @include('vistas.modal')
    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Mascota");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar la mascota: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>
    @endpush()

@endsection
