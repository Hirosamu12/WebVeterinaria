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
        <form action="{{ route('addDonations') }}" method="post">

        @csrf
        <label for="fecha_Donacion">Fecha Donación</label><br>
        <input type="date" id="fecha_Donacion" name="fecha_Donacion"><br>
        <label for="cantidad_Donacion">Cantidad</label><br>
        <input type="number" step="0.01" id="cantidad_Donacion" name="cantidad_Donacion"><br>
        <label for="lugar_Donacion">Lugar Donación</label><br>
        <input type="text" id="lugar_Donacion" name="lugar_Donacion"><br>
        <label for="estado_Donacion">Estado</label><br>
        <select id="estado_Donacion" name="estado_Donacion">
            <option value=1>Completo</option>
            <option value=2>Anulado</option>
        </select><br>
        <label for="id_Mascota_Receptor">Id Mascota Receptor</label><br>
        <input type="number" id="id_Mascota_Receptor" name="id_Mascota_Receptor"><br>
        <label for="id_Mascota_Donante">Id Mascota Donante</label><br>
        <input type="number" id="id_Mascota_Donante" name="id_Mascota_Donante">

        <br><br>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Agregar') }}
        </button>
        <br><br>

    </form>
@endsection
