@extends('layouts.app')

@section('content')
<div class="container" id="login-container">
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('/dist/theme/images/1.png') }}" alt="Image login register" class="img-responsive">
        </div>

        <div class="col-md-5">
            <h1 class="text-center font-quick">
                <b>INGRESA AQUÍ</b><br>
                PARA SOLICITAR TU SERVICIO
            </h1>
            <div class="panel panel-success">
                <div class="panel-heading no-spaces">
                    <p class="font-quick-white">INICIAR SESIÓN</p>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') && old('login')==1 ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">

                                @if ($errors->has('email') && old('login')==1)
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') && old('login')==1 ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" autocomplete="new-password">

                                @if ($errors->has('password') && old('login')==1)
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recordar sesión
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn-quick-small" name="login" value="1">
                                    INGRESAR <i class="glyphicon glyphicon-log-in"></i>
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-md-offset-1">
            <h1 class="text-center font-quick">
                <b>¿TODAVÍA NO TIENES UN USUARIO?</b><br>
                REGÍSTRATE GRATIS
            </h1>
            <div class="panel panel-success">
                <div class="panel-heading no-spaces">
                    <p class="font-quick-white">REGÍSTRATE POR PRIMERA VEZ</p>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') && old('register')==1 ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre completo">

                                @if ($errors->has('name') && old('register')==1)
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') && old('register')==1 ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">

                                @if ($errors->has('email') && old('register')==1)
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') && old('register')==1 ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">

                                @if ($errors->has('password') && old('register')==1)
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') && old('register')==1 ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">

                                @if ($errors->has('password_confirmation') && old('register')==1)
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn-quick-small" name="register" value="1">
                                    <i class="glyphicon glyphicon-send"></i> ENVIAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
