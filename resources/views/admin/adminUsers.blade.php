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
            <form action="{{ route('searchPeopleAdmin') }}" method="post">
                @csrf
                <label for="search">Buscar persona: </label>
                <input type="text" id="search" name="search"></input>
                <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    {{ __('Buscar Donantes') }}
                </button>
            </form>
            <br>
            <table class="table table-bordered table-hover" id="propietario_tb">
                <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 11%;">Nombre</th>
                        <th style="width: 11%;">Apellido</th>
                        <th style="width: 8%">Cédula</th>
                        <th style="width: 9%">Teléfono</th>
                        <th style="width: 18%">Dirección</th>
                        <th style="width: 18%;">Correo</th>
                        <th style="width: 7%;">Rol</th>
                        <th style="width: 7%;">Estado</th>
                        <th style="width: 9%">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id_Usuario }}</td>
                            <td>{{ $user->nombre_Usuario }}</td>
                            <td>{{ $user->apellido_Usuario }}</td>
                            <td>{{ $user->cedula }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>{{ $user->direccion }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->id_Rol }}</td>
                            <td>{{ $user->estado }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="window.location.href='{{ route('modifyUsers', ['id_Usuario' => $user->id_Usuario]) }}';">Modificar</button>
                                <button class="btn btn-sm btn-danger" onclick="window.location.href='{{ route('deleteUsers', ['id_Usuario' => $user->id_Usuario]) }}';">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
