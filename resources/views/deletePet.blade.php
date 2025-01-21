@extends('adminlte::page')

@section('content_header')
    <h1>Borrar Mascota</h1>
@endsection

@section('content')
    <p>Nombre: {{ $pet->nombre_Mascota }}</p>
    <p>Foto: {{ $pet->foto_Mascota }}</p>
    <p>Fecha Nacimiento: {{ $pet->fecha_Nacimiento }}</p>
    <p>Género: {{ $pet->genero }}</p>
    <p>Raza: {{ $pet->raza_Mascota }}</p>
    <p>Id Sangre: {{ $pet->id_Sangre_Mascota }}</p>
    <p>Id Usuario: {{ $pet->id_Usuario }}</p>
    <form action="{{ route('deletePet', $pet->id_Mascota) }}" method="post">
        @csrf
        @method('DELETE') <!-- This simulates a DELETE request -->
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Borrar') }}
        </button>
    </form>
@endsection
