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
                    @if (session('notification'))
                        <div class="alert alert-info">
                            <p>{{ session('notification') }}</p>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <p>Por favor revise los siguientes errores:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p>Para poder completar tu solicitud deberás completar los siguientes pasos:</p>
                    <form action="{{ url('/request') }}" method="post">
                        {{ csrf_field() }}
                        <fieldset>
                            <h3><span class="text-success">1.</span> Selecciona un servicio.</h3>
                            @foreach ($types as $type)
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="{{ $type->id }}"> {{ $type->name }}
                                </label>
                            @endforeach

                            <h3><span class="text-success">2.</span> Selecciona la fecha.</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="request_date" id="request_date" value="{{ date('d/m/Y') }}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <div id="datepicker" data-date="{{ date('d/m/Y') }}"></div>
                                </div>
                            </div>

                            <h3><span class="text-success">3.</span> Selecciona la hora.</h3>
                            <input type="time" name="request_time" value="{{ date('H:i') }}" class="form-control">
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
            $('#datepicker').datepicker({
                format: 'dd/mm/yyyy'
            });
            $('#datepicker').on('changeDate', function() {
                $('#request_date').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
                console.log($('#datepicker').datepicker('getDate'));
            });
        });
    </script>
@endsection
