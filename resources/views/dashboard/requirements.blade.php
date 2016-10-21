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
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>16/10/2016</td>
                                    <td>Mozo</td>
                                    <td>14:30</td>
                                    <td>Por confirmar</td>
                                    <td><button class="btn btn-default btn-sm">Ver datos</button></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>22/10/2016</td>
                                    <td>Reparación de electrodomésticos</td>
                                    <td>16:00</td>
                                    <td>Confirmado</td>
                                    <td><button class="btn btn-default btn-sm">Ver datos</button></td>
                                </tr>
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
@endsection

@section('scripts')
    <script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#datepicker').datepicker();
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
            });
        });
    </script>
@endsection
