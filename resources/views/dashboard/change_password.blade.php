@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @include('layouts.left-menu')

        <div class="col-md-8">
            <h3>Bienvenido, {{ auth()->user()->name }}</h3>
            <hr>
            <div class="panel panel-success">
                <div class="panel-heading">
                    Modificar tu contraseña
                </div>

                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p>Probablemente esta es la primera vez que ingresas al sistema.</p>
                    <p>Lo primero que debes hacer es modificar tu contraseña.</p>
                    <p>A continuación ingresa una nueva contraseña. Escríbela 2 veces para confirmar.</p>
                    <form action="{{ url('/change-password') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Nueva contraseña</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-sm-3 control-label">Confirmar contraseña</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <p class="text-muted">Asegúrese de recordar esta contraseña. Anótela en algún lugar si lo considera necesario.</p>
                            <div class="text-center">
                                <button class="btn btn-success">Modificar contraseña</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
