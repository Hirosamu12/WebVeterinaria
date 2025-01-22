@extends('adminlte::page')

@section('content_header')
    <h1>Borrar Usuario</h1>
@endsection

@section('content')
    <p>Nombre: {{ $user->nombre_Usuario }}</p>
    <p>Apellido: {{ $user->apellido_Usuario }}</p>
    <p>Cédula: {{ $user->cedula }}</p>
    <p>Teléfono: {{ $user->telefono }}</p>
    <p>Dirección: {{ $user->direccion }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Id Rol: {{ $user->id_Rol }}</p>
    <p>Estado: {{ $user->estado }}</p>
    <form action="{{ route('deleteUser', $user->id_Usuario) }}" method="post">
        @csrf
        @method('DELETE') <!-- This simulates a DELETE request -->
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Borrar') }}
        </button>
    </form>
@endsection
