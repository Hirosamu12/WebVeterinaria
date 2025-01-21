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
            <table class="table table-bordered table-hover" id="propietario_tb">
                <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 11%;">Nombre</th>
                        <th style="width: 11%;">Foto</th>
                        <th style="width: 13%">Fecha Nacimiento</th>
                        <th style="width: 13%">Género</th>
                        <th style="width: 13%">Raza</th>
                        <th style="width: 7%;">Id Sangre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                        <tr>
                            <td>{{ $pet->id_Mascota }}</td>
                            <td>{{ $pet->nombre_Mascota }}</td>
                            <td>{{ $pet->foto_Mascota }}</td>
                            <td>{{ $pet->fecha_Nacimiento }}</td>
                            <td>{{ $pet->genero }}</td>
                            <td>{{ $pet->raza_Mascota }}</td>
                            <td>{{ $pet->id_Sangre_Mascota }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

    <script>
        function mostrarBorrarUsuario(idUsuario) {
            alert("Modificar usuario con ID: " + idUsuario);
    
            // Ejemplo: redirigir a otra página
            // window.location.href = "/modificar-usuario/" + idUsuario;
    
            // O abrir un modal
            // $('#modalModificarUsuario').modal('show');
            // $('#modalModificarUsuario input[name="id"]').val(idUsuario);
        }
    </script>
@endsection
