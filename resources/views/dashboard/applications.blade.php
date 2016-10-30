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
                    Tus aplicaciones
                </div>

                <div class="panel-body">
                    @if (session('notification'))
                        <div class="alert alert-success">
                            <p>{{ session('notification') }}</p>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <ul>
                        <li>El estado <strong>Por confirmar</strong> significa que el cliente aun no ha rechazado ni confirmado.</li>
                        <li>Si el cliente confirma, tu aplicación tendrá el estado <strong>Confirmado</strong> y podrás acceder a la información de contacto.</li>
                        <li>Si el cliente rechaza tu aplicación por algún motivo, el estado será <strong>Rechazado</strong>.</li>
                    </ul>
                    <p>Has aplicado a las siguientes solicitudes.</p>
                    <form action="{{ url('/apply') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <th>Código</th>
                                    <th>Fecha servicio</th>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->service_request->date_format }}</td>
                                    <td>{{ $application->service_request->time_format }}</td>
                                    <td>{{ $application->service_request->user->name }}</td>
                                    <td>{{ $application->status }}</td>
                                    <td><button type="button" class="btn btn-default btn-sm" data-application="{{ $application->service_request->id }}">Ver datos</button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p>Si tienes alguna duda, no dudes en usar el <a href="#">formulario de contacto</a>.</p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

    @foreach ($applications as $application)
    <div class="modal" id="modal-{{ $application->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Datos del cliente</h4>
                </div>
                <div class="modal-body">
                    <p>Aquí se mostrará la información principal del cliente, luego que haya confirmado que está interesado en tu servicio.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/applications.js') }}"></script>
@endsection