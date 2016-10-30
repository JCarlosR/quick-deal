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
                    Aplica a una solicitud de servicio en:
                    <strong>{{ auth()->user()->service_type->name }}</strong>
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

                    <p>Las solicitudes mostradas a continuación están en estado de espera.</p>
                    <p>Si un proveedor aplica a una solicitud, ésta desaparece de la lista.</p>
                    <p>El cliente tiene la posibilidad de confirmar o rechazar al proveedor.</p>
                    <p>Si el cliente decide rechazar al proveedor, la solicitud aparecerá nuevamente aquí.</p>
                    <form action="{{ url('/apply') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <th></th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($requirements as $requirement)
                                <tr>
                                    <td>
                                        <input type="radio" name="service_request_id" value="{{ $requirement->id }}" />
                                    </td>
                                    <td>{{ $requirement->date_format }}</td>
                                    <td>{{ $requirement->time_format }}</td>
                                    <td>{{ $requirement->user->name }}</td>
                                    <td><button type="button" class="btn btn-default btn-sm" data-request="{{ $requirement->id }}">Ver datos</button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="text-muted">Seleccione la solicitud a la que desea aplicar.</p>
                            <div class="text-center">
                                <button class="btn btn-success">Aplicar a la solicitud de servicio</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

    @foreach ($requirements as $requirement)
    <div class="modal" id="modal-{{ $requirement->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Datos del requerimiento</h4>
                </div>
                <div class="modal-body">
                    <p>Aquí se mostrará con mayor detalle lo solicitado en el requerimiento.</p>
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
    <script src="{{ asset('dist/js/requirements.js') }}"></script>
@endsection
