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
        <form action="{{ route('addPet') }}" method="post" enctype="multipart/form-data">

        @csrf
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre_Mascota"><br>
        <label for="cedula">Foto</label><br>
        <input type="file" id="foto_Mascota" name="foto_Mascota" accept="image/*"><br>
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
        <label for="cedula">Numero de Cedula del Dueño</label><br>
        <input type="number" id="cedula" name="cedula">

        <br><br>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Agregar') }}
        </button>
        <br><br>
    </form>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
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
