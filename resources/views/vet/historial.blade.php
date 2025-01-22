@extends('adminlte::page')

@section('content_header')
    <h1>Historial</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <button class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}" onclick="window.location.href='{{ route('addHistorial') }}'">
            {{ __('Agregar Nuevo') }}
        </button>
        <div class="col-md-12">
            
            <br>
            <table class="table table-bordered table-hover" id="propietario_tb">
                <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 11%;">Ultima Modificación</th>
                        <th style="width: 11%;">Fecha Historial</th>
                        <th style="width: 13%">Observaciones Historial</th>
                        <th style="width: 13%">Id Mascota</th>
                        <th style="width: 9%">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historiales as $historial)
                        <tr>
                            <td>{{ $historial->id_Historial }}</td>
                            <td>{{ $historial->ultima_Modificacion }}</td>
                            <td>{{ $historial->fecha_Historial }}</td>
                            <td>{{ $historial->observaciones_Historial }}</td>
                            <td>{{ $historial->id_Mascota }}</td>       
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="window.location.href='{{ route('seeModifyHistorial', ['id_Historial' => $historial->id_Historial]) }}';">Modificar</button>
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
