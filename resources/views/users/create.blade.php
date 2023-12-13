@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir Usuario
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ url('/users/create') }}" method="POST">

                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre')" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <!-- Apellidos -->
                        <div>
                            <x-input-label for="apellidos" :value="__('Apellidos')" />
                            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                                :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
                        </div>

                        <!-- Email Address -->

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="password1">Contraseña:</label>
                            <input type="password" name="password1" id="password1">
                        </div>

                        <div class="form-group">
                            <label for="password2">Repita contraseña:</label>
                            <input type="password" name="password2" id="password2">
                        </div>

                        <div class="form-group">
                            <label for="linkedin">Perfil Linkedin:</label>
                            <input type="url" id="linkedin" name="linkedin">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir Usuario
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
