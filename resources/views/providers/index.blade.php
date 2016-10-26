@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @include('layouts.left-menu')

        <div class="col-md-8">
            <h3>Bienvenido, {{ Auth::user()->name }}</h3>
            <hr>
            <div class="panel panel-success">
                <div class="panel-heading">Proveedores</div>

                <div class="panel-body">
                    <p>Solo usted como administrador tiene acceso a esta sección.</p>
                    <p>Desde aquí es posible gestionar la información de los proveedores.</p>
                    <form action="">
                        <fieldset>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <th>Nombre</th>
                                    <th>Fecha de registro</th>
                                    <th>Tipo de servicio</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $provider->name }}</td>
                                    <td>{{ $provider->created_date }}</td>
                                    <td>{{ $provider->service_type->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-xs" data-show="{{ $provider->id }}" title="Ver datos">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-xs" data-edit="{{ $provider->id }}" title="Modificar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-delete="{{ $provider->id }}" title="Dar de baja">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="text-muted">Si desea puede registrar un nuevo proveedor.</p>
                            <div class="text-center">
                                <a href="{{ url('/providers/new') }}" class="btn btn-success">
                                    Nuevo proveedor
                                </a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

    @foreach ($providers as $provider)
    <div class="modal" id="modal-{{ $provider->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Datos del proveedor</h4>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <legend>Datos del proveedor</legend>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Apellidos y nombres</th>
                                <td>{{ $provider->name }}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{ $provider->address }}</td>
                            </tr>
                            <tr>
                                <th>Dpto / Región</th>
                                <td>{{ $provider->region }}</td>
                            </tr>
                            <tr>
                                <th>Distrito</th>
                                <td>{{ $provider->district }}</td>
                            </tr>
                            <tr>
                                <th>Tipo de servicio</th>
                                <td>{{ $provider->service_type->name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Información de contacto</legend>
                        <p>Contacto para procesos de contratación</p>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th class="col-md-6">Nombre</th>
                                <td class="col-md-6">{{ $provider->contract_name }}</td>
                            </tr>
                            <tr>
                                <th>Correo electrónico</th>
                                <td>{{ $provider->contract_email }}</td>
                            </tr>
                            <tr>
                                <th>Celular</th>
                                <td>{{ $provider->contract_cellphone }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td>{{ $provider->contract_phone }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <p>Contacto para pagos y/o actualización de datos</p>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th class="col-md-6">Nombre</th>
                                <td class="col-md-6">{{ $provider->payment_name }}</td>
                            </tr>
                            <tr>
                                <th>Correo electrónico</th>
                                <td>{{ $provider->payment_email }}</td>
                            </tr>
                            <tr>
                                <th>Celular</th>
                                <td>{{ $provider->payment_cellphone }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td>{{ $provider->payment_phone }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Experiencia profesional</legend>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Perfil profesional</th>
                                <td>{{ $provider->professional_profile }}</td>
                            </tr>
                            <tr>
                                <th>Experiencia profesional</th>
                                <td>{{ $provider->professional_experience }}</td>
                            </tr>
                            <tr>
                                <th>Educación</th>
                                <td>{{ $provider->professional_education }}</td>
                            </tr>
                            <tr>
                                <th>Especialidad</th>
                                <td>{{ $provider->professional_specialty }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Cuenta de usuario</legend>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $provider->email }}</td>
                            </tr>
                            <tr>
                                <th>Contraseña</th>
                                <td><a href="#">Asignar nueva contraseña</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
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
    <script src="{{ asset('dist/js/providers/index.js') }}"></script>
@endsection
