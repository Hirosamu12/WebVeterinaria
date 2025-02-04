@extends('adminlte::page')

@section('content_header')
    <h1>Nuevos Datos</h1>
@endsection

@section('content')
        <form action="{{ route('modifyHistorial', $historial->id_Historial) }}" method="post">
            @csrf
            <label for="fecha_Historial">Fecha Historial</label><br>
            <input type="date" id="fecha_Historial" value="{{ $historial->fecha_Historial }}" name="fecha_Historial"><br>
            <label for="observaciones_Historial">observaciones Historial</label><br>
            <input type="text" id="observaciones_Historial" name="observaciones_Historial"><br>
            <label for="id_Mascota">Id Mascota</label><br>
            <input type="number" id="id_Mascota" value="{{ $historial->id_Mascota }}" name="id_Mascota">
    
            <br><br>
            <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                {{ __('Agregar') }}
            </button>
            <br><br>
    </form>
@endsection
