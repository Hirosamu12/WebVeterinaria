@extends('adminlte::page')

@section('content_header')
    <h1>Nuevos Datos</h1>
@endsection

@section('content')
        <form action="{{ route('modificarMascota', $pet->id_Mascota) }}" method="post">

        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre_Mascota" value="{{ $pet->nombre_Mascota }}"><br>
        <label for="cedula">Foto</label><br>
        <input type="text" id="foto_Mascota" name="foto_Mascota" value="{{ $pet->foto_Mascota }}"><br>
        <label for="fecha_Nacimiento">Fecha Nacimiento</label><br>
        <input type="date" id="fecha_Nacimiento" name="fecha_Nacimiento" value="{{ $pet->fecha_Nacimiento }}"><br>
        <label for="genero">Género</label><br>
        <input type="radio" id="Macho" name="genero" value="Macho" 
            {{ $pet->genero == 'Macho' ? 'checked' : '' }}>
        <label for="Macho">Macho</label>
        <input type="radio" id="Hembra" name="genero" value="Hembra" 
            {{ $pet->genero == 'Hembra' ? 'checked' : '' }}>
        <label for="Hembra">Hembra</label><br>
        <label for="raza_Mascota">Raza</label>
        <input type="text" id="raza_Mascota" name="raza_Mascota" value="{{ $pet->raza_Mascota }}"><br>
        <label for="id_Sangre">Tipo de Sangre</label><br>
        <select id="id_Sangre" name="id_Sangre_Mascota">
            <option value=1 {{ $pet->id_Sangre_Mascota == 1 ? 'selected' : '' }}>1.1+</option>
            <option value=2 {{ $pet->id_Sangre_Mascota == 2 ? 'selected' : '' }}>1.1-</option>
            <option value=3 {{ $pet->id_Sangre_Mascota == 3 ? 'selected' : '' }}>1.2+</option>
            <option value=4 {{ $pet->id_Sangre_Mascota == 4 ? 'selected' : '' }}>1.2-</option>
            <option value=5 {{ $pet->id_Sangre_Mascota == 5 ? 'selected' : '' }}>2+</option>
            <option value=6 {{ $pet->id_Sangre_Mascota == 6 ? 'selected' : '' }}>2-</option>
            <option value=7 {{ $pet->id_Sangre_Mascota == 7 ? 'selected' : '' }}>3+</option>
            <option value=8 {{ $pet->id_Sangre_Mascota == 8 ? 'selected' : '' }}>3-</option>
            <option value=9 {{ $pet->id_Sangre_Mascota == 9 ? 'selected' : '' }}>4+</option>
            <option value=10 {{ $pet->id_Sangre_Mascota == 10 ? 'selected' : '' }}>4-</option>
            <option value=11 {{ $pet->id_Sangre_Mascota == 11 ? 'selected' : '' }}>5+</option>
            <option value=12 {{ $pet->id_Sangre_Mascota == 12 ? 'selected' : '' }}>5-</option>
            <option value=13 {{ $pet->id_Sangre_Mascota == 13 ? 'selected' : '' }}>6+</option>
            <option value=14 {{ $pet->id_Sangre_Mascota == 14 ? 'selected' : '' }}>6-</option>
            <option value=15 {{ $pet->id_Sangre_Mascota == 15 ? 'selected' : '' }}>7+</option>
            <option value=16 {{ $pet->id_Sangre_Mascota == 16 ? 'selected' : '' }}>7-</option>
            <option value=17 {{ $pet->id_Sangre_Mascota == 17 ? 'selected' : '' }}>8+</option>
            <option value=18 {{ $pet->id_Sangre_Mascota == 18 ? 'selected' : '' }}>8-</option>
        </select><br>
        <label for="id_Usuario">Id Dueño</label><br>
        <input type="number" id="id_Usuario" name="id_Usuario" value="{{ $pet->id_Usuario }}">

        <br><br>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Modificar') }}
        </button>
        <br><br>
    </form>
@endsection
