@extends('adminlte::page')

@section('content_header')
    <h1>Nuevos Datos</h1>
@endsection

@section('content')
        <form action="{{ route('modificarUsuario', $user->id_Usuario) }}" method="post">

        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ $user->nombre_Usuario }}"><br>
        <label for="apellido">Apellido</label><br>
        <input type="text" id="apellido" name="apellido" value="{{ $user->apellido_Usuario }}"><br>
        <label for="cedula">Cédula</label><br>
        <input type="number" id="cedula" name="cedula" value="{{ $user->cedula }}"><br>
        <label for="telefono">Teléfono</label><br>
        <input type="text" id="telefono" name="telefono" value="{{ $user->telefono }}"><br>
        <label for="email">Correo</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}"><br>
        <label for="estado">Estado</label><br>
        <select id="estado" name="estado">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select><br>
        <label for="id_rol">Id Rol</label><br>
        <select id="id_rol" name="id_rol">
            <option value="1">Administrdor</option>
            <option value="2">Veterinario</option>
            <option value="3">Usuario</option>
          </select><br>
        <br>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Modificar') }}
        </button>
        <br><br>
    </form>
@endsection
