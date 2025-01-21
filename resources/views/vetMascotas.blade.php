@extends('adminlte::page')

@section('content_header')
    <h1>Usuarios</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        
        <div class="col-md-12">
            <button class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}" onclick="window.location.href='{{ route('addPets') }}'">
                {{ __('Agregar Nuevo') }}
            </button>
            <br>
            <table class="table table-bordered table-hover" id="propietario_tb">
                <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 11%;">Nombre</th>
                        <th style="width: 11%;">Foto</th>
                        <th style="width: 13%">Fecha Nacimiento</th>
                        <th style="width: 13%">Género</th>
                        <th style="width: 13%">Raza</th>
                        <th style="width: 7%">Id Sangre</th>
                        <th style="width: 7%">Id Usuario</th>
                        <th style="width: 9%">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet->id_Mascota }}</td>
                            <td>{{ $pet->nombre_Mascota }}</td>
                            <td>{{ $pet->foto_Mascota }}</td>
                            <td>{{ $pet->fecha_Nacimiento }}</td>
                            <td>{{ $pet->genero }}</td>
                            <td>{{ $pet->raza_Mascota }}</td>
                            <td>{{ $pet->id_Sangre_Mascota }}</td>
                            <td>{{ $pet->id_Usuario }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="window.location.href='{{ route('modifyPets', ['id_Mascota' => $pet->id_Mascota]) }}';">Modificar</button>
                                <button class="btn btn-sm btn-danger" onclick="window.location.href='{{ route('deletePets', ['id_Mascota' => $pet->id_Mascota]) }}';">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
