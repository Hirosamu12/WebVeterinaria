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
        <form action="{{ route('addPet') }}" method="post">

        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre_Mascota"><br>
        <label for="cedula">Foto</label><br>
        <input type="text" id="foto_Mascota" name="foto_Mascota"><br>
        <label for="fecha_Nacimiento">Fecha Nacimiento</label><br>
        <input type="date" id="fecha_Nacimiento" name="fecha_Nacimiento"><br>
        <label for="genero">Género</label><br>
        <input type="radio" id="Macho" name="genero" value="Macho">
        <label for="Macho">Macho</label>
        <input type="radio" id="Hembra" name="genero" value="Hembra">
        <label for="Hembra">Hembra</label><br>
        <label for="raza_Mascota">Raza</label><br>
        <input type="text" id="raza_Mascota" name="raza_Mascota"><br>
        <label for="id_Sangre">Tipo de Sangre</label><br>
        <select id="id_Sangre" name="id_Sangre_Mascota">
            <option value=1>1.1+</option>
            <option value=2>1.1-</option>
            <option value=3>1.2+</option>
            <option value=4>1.2-</option>
            <option value=5>2+</option>
            <option value=6>2-</option>
            <option value=7>3+</option>
            <option value=8>3-</option>
            <option value=9>4+</option>
            <option value=10>4-</option>
            <option value=11>5+</option>
            <option value=12>5-</option>
            <option value=13>6+</option>
            <option value=14>6-</option>
            <option value=15>7+</option>
            <option value=16>7-</option>
            <option value=17>8+</option>
            <option value=18>8-</option>
        </select><br>
        <label for="id_Usuario">Id Dueño</label><br>
        <input type="number" id="id_Usuario" name="id_Usuario">

        <br><br>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Agregar') }}
        </button>
        <br><br>

    </form>
@endsection
