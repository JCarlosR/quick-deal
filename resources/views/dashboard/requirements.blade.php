@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">

        @include('layouts.left-menu')

        <div class="col-md-8">
            <h3>Bienvenido, {{ Auth::user()->name }}</h3>
            <hr>
            <div class="panel panel-success">
                <div class="panel-heading">Tus requerimientos</div>

                <div class="panel-body">
                    @if (session('notification'))
                        <div class="alert alert-info">
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

                    <form action="{{ url('/confirm') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <th></th>
                                    <th>Fecha</th>
                                    <th>Tipo de servicio</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($requirements as $requirement)
                                <tr>
                                    <td>
                                        @if ($requirement->status == 'Asignado')
                                            <input type="radio" name="requirement_id" value="{{ $requirement->id }}" />
                                        @else
                                            <input type="radio" disabled />
                                        @endif
                                    </td>
                                    <td>{{ $requirement->date_format }}</td>
                                    <td>{{ $requirement->service_type->name }}</td>
                                    <td>{{ $requirement->time_format }}</td>
                                    <td>{{ $requirement->status }}</td>
                                    <td><button type="button" class="btn btn-default btn-sm" data-request="{{ $requirement->id }}">Ver datos</button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="text-muted">Seleccione los pedidos que desea confirmar.</p>
                            <div class="text-center">
                                <button class="btn btn-success">Confirmar pedido</button>
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
                    <h4 class="modal-title">Datos del proveedor</h4>
                </div>
                <div class="modal-body">
                    @if ($requirement->status == 'En espera')
                        <p>Aquí usted podrá ver la información del proveedor que haya aplicado a su solicitud de servicio.</p>
                        <p>Usted será notificado vía e-mail cuando esto suceda.</p>
                    @else {{-- if ($requirement->status == 'Asignado') --}}
                        <legend>Datos del proveedor</legend>
                        <p>
                            <strong>Nombre del proveedor: </strong>{{ $requirement->application->provider->name }}
                        </p>
                        <p>
                            <strong>E-mail: </strong>{{ $requirement->application->provider->email }}
                        </p>
                        <p>
                            <strong>Dirección: </strong>{{ $requirement->application->provider->address }}
                        </p>
                        <p>
                            <strong>Dpto/Región: </strong>{{ $requirement->application->provider->region }}
                        </p>
                        <p>
                            <strong>Distrito: </strong>{{ $requirement->application->provider->district }}
                        </p>

                        <legend>Experiencia profesional</legend>
                        <p>
                            <strong>Perfil profesional: </strong>{{ $requirement->application->provider->professional_profile }}
                        </p>
                        <p>
                            <strong>Experiencia: </strong>{{ $requirement->application->provider->professional_experience }}
                        </p>
                        <p>
                            <strong>Educación: </strong>{{ $requirement->application->provider->professional_education }}
                        </p>
                        <p>
                            <strong>Especialidad: </strong>{{ $requirement->application->provider->professional_specialty }}
                        </p>
                        @if ($requirement->status == 'Confirmado')
                        <legend>Datos de contacto</legend>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Contacto para contratos</th>
                                <th>Contacto para pagos</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <p>
                                        <strong>Nombre: </strong>{{ $requirement->application->provider->contract_name }}
                                    </p>
                                    <p>
                                        <strong>E-mail: </strong>{{ $requirement->application->provider->contract_email }}
                                    </p>
                                    <p>
                                        <strong>Celular: </strong>{{ $requirement->application->provider->contract_cellphone }}
                                    </p>
                                    <p>
                                        <strong>Teléfono: </strong>{{ $requirement->application->provider->contract_phone }}
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong>Nombre: </strong>{{ $requirement->application->provider->payment_name }}
                                    </p>
                                    <p>
                                        <strong>E-mail: </strong>{{ $requirement->application->provider->payment_email }}
                                    </p>
                                    <p>
                                        <strong>Celular: </strong>{{ $requirement->application->provider->payment_cellphone }}
                                    </p>
                                    <p>
                                        <strong>Teléfono: </strong>{{ $requirement->application->provider->payment_phone }}
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    @endif
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
