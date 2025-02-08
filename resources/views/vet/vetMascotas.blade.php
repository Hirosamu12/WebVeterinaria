@extends('adminlte::page')

@section('content_header')
    <h1>Mascotas</h1>
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
                        <th style="width: 7%">Tipo Sangre</th>
                        <th style="width: 7%">Id Usuario</th>
                        <th style="width: 9%">Operaciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet->id_Mascota }}</td>
                            <td>{{ $pet->nombre_Mascota }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $pet->foto_Mascota) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $pet->foto_Mascota) }}" alt="Foto de {{ $pet->nombre_Mascota }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                </a>
                            </td>                            
                            <td>{{ $pet->fecha_Nacimiento }}</td>
                            <td>{{ $pet->genero }}</td>
                            <td>{{ $pet->raza_Mascota }}</td>
                            <td>
                                @switch($pet->id_Sangre_Mascota)
                                    @case(1)
                                        1.1+
                                        @break
                                    @case(2)
                                        1.1-
                                        @break
                                    @case(3)
                                        1.2+
                                        @break
                                    @case(4)
                                        1.2-
                                        @break
                                    @case(5)
                                        2+
                                        @break
                                    @case(6)
                                        2-
                                        @break
                                    @case(7)
                                        3+
                                        @break
                                    @case(8)
                                        3-
                                        @break
                                    @case(9)
                                        4+
                                        @break
                                    @case(10)
                                        4-
                                        @break
                                    @case(11)
                                        5+
                                        @break
                                    @case(12)
                                        5-
                                        @break
                                    @case(13)
                                        6+
                                        @break
                                    @case(14)
                                        6-
                                        @break
                                    @case(15)
                                        7+
                                        @break
                                    @case(16)
                                        7-
                                        @break
                                    @case(17)
                                        8+
                                        @break
                                    @case(18)
                                        8-
                                        @break
                                @endswitch
                            </td>
                            
                            <td>{{ $pet->id_Usuario }}, {{ $pet->nombre_Usuario }}</td>
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
