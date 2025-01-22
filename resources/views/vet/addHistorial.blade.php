@extends('adminlte::page')

@section('content_header')
    <h1>Añadir nuevo</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('addHistorials') }}" method="post">

        @csrf
        <label for="fecha_Historial">Fecha Historial</label><br>
        <input type="date" id="fecha_Historial" name="fecha_Historial"><br>
        <label for="observaciones_Historial">observaciones Historial</label><br>
        <input type="text" id="observaciones_Historial" name="observaciones_Historial"><br>
        <label for="id_Mascota">Id Mascota</label><br>
        <input type="number" id="id_Mascota" name="id_Mascota">

        <br><br>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Agregar') }}
        </button>
        <br><br>

    </form>
@endsection
