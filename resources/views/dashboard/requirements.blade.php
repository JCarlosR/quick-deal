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
                    <form action="">
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
                                            <input type="checkbox">
                                        @else
                                            <input type="checkbox" disabled>
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
                    @elseif ($requirement->status == 'Asignado')
                        <p>DATOS DEL PROVEEDOR SIN INFO DE CONTACTO</p>
                    @else
                        <p>TODOS LOS DATOS DEL PROVEEDOR</p>
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
