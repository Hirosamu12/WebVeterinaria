@extends('adminlte::page')

@section('content_header')
    <h1>Donaciones</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <button class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}" onclick="window.location.href='{{ route('addDonation') }}'">
            {{ __('Agregar Nuevo') }}
        </button>
        <div class="col-md-12">
            
            <br>
            <table class="table table-bordered table-hover" id="propietario_tb">
                <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 11%;">Ultima Modificación</th>
                        <th style="width: 11%;">Fecha Donación</th>
                        <th style="width: 13%">Cantidad Donación (ml)</th>
                        <th style="width: 13%">Lugar Donación</th>
                        <th style="width: 13%">Estado</th>
                        <th style="width: 7%">Id/Nombre Mascota Receptor</th>
                        <th style="width: 7%">Id/Nombre Mascota Donante</th>
                        <th style="width: 9%">Operaciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->id_Donacion }}</td>
                            <td>{{ $donation->ultima_Modificacion }}</td>
                            <td>{{ $donation->fecha_Donacion }}</td>
                            <td>{{ $donation->cantidad_Donacion }}</td>
                            <td>{{ $donation->lugar_Donacion }}</td>
                            <td>
                                @switch($donation->estado_Donacion)
                                    @case(1)
                                        Completado
                                        @break
                                    @case(2)
                                        Anulado
                                        @break</td>
                                @endswitch
                            <td>{{ $donation->id_Mascota_Receptor }}<br>{{ $donation->nombre_Mascota_Receptor }}</td>
                            <td>{{ $donation->id_Mascota_Donante }}<br>{{ $donation->nombre_Mascota_Donante }}</td>        
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="window.location.href='{{ route('seeModifyDonation', ['id_Donacion' => $donation->id_Donacion]) }}';">Modificar</button>
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
