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
                <div class="panel-heading">Proveedores</div>

                <div class="panel-body">
                    <p>Solo usted como administrador tiene acceso a esta sección.</p>
                    <p>Desde aquí es posible gestionar la información de los proveedores.</p>
                    <form action="">
                        <fieldset>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="success">
                                    <th>Código</th>
                                    <th>Fecha de registro</th>
                                    <th>Tipo de servicio</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->created_at }}</td>
                                    <td>{{ 'XD' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-sm" data-show="{{ $provider->id }}">Ver datos</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-edit="{{ $provider->id }}">Modificar</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-delete="{{ $provider->id }}">Dar de baja</button>
                                    </td>
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

    @foreach ($providers as $provider)
    <div class="modal" id="modal-{{ $provider->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Datos del proveedor</h4>
                </div>
                <div class="modal-body">
                    <p>TODOS LOS DATOS DEL PROVEEDOR {{ $provider->id }}</p>
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
