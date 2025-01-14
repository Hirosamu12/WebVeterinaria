@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        @csrf

        {{-- First name field --}}
        <div class="input-group mb-3">
            <input type="text" name="nombre_Usuario" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('nombre_Usuario') }}" placeholder="{{ __('Nombre') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    {{--para poner la rayita del costado sin la imagen--}}
                </div>
            </div>

            @error('nombre_Usuario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Last name field --}}
        <div class="input-group mb-3">
            <input type="text" name="apellido_Usuario" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('apellido_Usuario') }}" placeholder="{{ __('Apellido') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    {{--para poner la rayita del costado sin la imagen--}}
                </div>
            </div>

            @error('apellido_Usuario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- cedula field --}}
        <div class="input-group mb-3">
            <input type="int" name="cedula" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('cedula') }}" placeholder="{{ __('Cedula') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    {{--para poner la rayita del costado sin la imagen--}}
                </div>
            </div>

            @error('cedula')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- direccion field --}}
        <div class="input-group mb-3">
            <input type="text" name="direccion" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('direccion') }}" placeholder="{{ __('Dirección') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    {{--para poner la rayita del costado sin la imagen--}}
                </div>
            </div>

            @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- phone field --}}
        <div class="input-group mb-3">
            <input type="text" name="telefono" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('telefono') }}" placeholder="{{ __('Teléfono') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    {{--para poner la rayita del costado sin la imagen--}}
                </div>
            </div>

            @error('apellido_Usuario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('Correo') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
