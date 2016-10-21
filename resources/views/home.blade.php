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
                <div class="panel-heading">Solicita un servicio</div>

                <div class="panel-body">
                    <p>Para poder completar tu solicitud deberás completar los siguientes pasos:</p>
                    <form action="">
                        <fieldset>
                            <h3><span class="text-success">1.</span> Selecciona un servicio.</h3>
                            <label class="radio-inline">
                                <input type="radio" name="categories[]" id="categoryRadio1" value="option1"> Mozo
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="categories[]" id="categoryRadio2" value="option2"> Gasfitería
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="categories[]" id="categoryRadio3" value="option3"> Reparación de electrodomésticos y equipos
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="categories[]" id="categoryRadio4" value="option4"> Jardinería
                            </label>

                            <h3><span class="text-success">2.</span> Selecciona la fecha.</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="my_hidden_input" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <div id="datepicker" data-date="15/10/2016"></div>
                                </div>
                            </div>

                            <h3><span class="text-success">3.</span> Selecciona la hora.</h3>
                            <input type="time" value="14:30" class="form-control">
                            <p>En formato de 24 horas.</p>
                            <div class="text-center">
                                <button class="btn btn-success">Enviar solicitud</button>
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
