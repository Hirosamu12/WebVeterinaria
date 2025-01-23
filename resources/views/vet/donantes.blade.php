@extends('adminlte::page')

@section('content_header')
    <h1>Posibles Donantes</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
        <form action="{{ route('searchDonant') }}" method="post">
            @csrf
            <label for="id_Sangre">Tipo de Sangre del Receptor: </label>
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
            </select>
            <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                {{ __('Buscar Donantes') }}
            </button>
        </form>
        <div class="col-md-12">
            <br>
            <table class="table table-bordered table-hover" id="propietario_tb">
                <thead>
                    <tr>
                        <th style="width: 2%;">#</th>
                        <th style="width: 11%;">Nombre</th>
                        <th style="width: 11%;">Foto</th>
                        <th style="width: 13%">Fecha Nacimiento</th>
                        <th style="width: 13%">Género</th>
                        <th style="width: 13%">Raza</th>
                        <th style="width: 7%">Tipo Sangre</th>
                        <th style="width: 7%">Id Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donantes as $donante)
                        <tr>
                            <td>{{ $donante->id_Mascota }}</td>
                            <td>{{ $donante->nombre_Mascota }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $donante->foto_Mascota) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $donante->foto_Mascota) }}" alt="Foto de {{ $donante->nombre_Mascota }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                </a>
                            </td>                            
                            <td>{{ $donante->fecha_Nacimiento }}</td>
                            <td>{{ $donante->genero }}</td>
                            <td>{{ $donante->raza_Mascota }}</td>
                            <td>
                                @switch($donante->id_Sangre_Mascota)
                                    @case(1)
                                        1.1+
                                        @break
                                    @case(2)
                                        1.1-
                                        @break
                                    @case(3)
                                        1.2+
                                        @break
                                    @case(4)
                                        1.2-
                                        @break
                                    @case(5)
                                        2+
                                        @break
                                    @case(6)
                                        2-
                                        @break
                                    @case(7)
                                        3+
                                        @break
                                    @case(8)
                                        3-
                                        @break
                                    @case(9)
                                        4+
                                        @break
                                    @case(10)
                                        4-
                                        @break
                                    @case(11)
                                        5+
                                        @break
                                    @case(12)
                                        5-
                                        @break
                                    @case(13)
                                        6+
                                        @break
                                    @case(14)
                                        6-
                                        @break
                                    @case(15)
                                        7+
                                        @break
                                    @case(16)
                                        7-
                                        @break
                                    @case(17)
                                        8+
                                        @break
                                    @case(18)
                                        8-
                                        @break
                                @endswitch
                            </td>
                            
                            <td>{{ $donante->id_Usuario }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
