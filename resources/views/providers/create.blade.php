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
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p>Los proveedores que cumplan con las condiciones requeridas serán registrados a través del siguiente formulario.</p>
                    <form action="{{ url('/providers') }}" class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>Datos del proveedor</legend>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Apellidos y nombres</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Dirección</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="region" class="col-sm-3 control-label">Dpto / Región</label>
                                <div class="col-sm-9">
                                    <input type="text" name="region" class="form-control" value="{{ old('region') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="col-sm-3 control-label">Distrito</label>
                                <div class="col-sm-9">
                                    <input type="text" name="district" class="form-control" value="{{ old('district') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="service_type" class="col-sm-3 control-label">Tipo de servicio</label>
                                <div class="col-sm-9">
                                    <select name="service_type" class="form-control">
                                        <option value="">Seleccione un tipo de servicio</option>
                                        @foreach ($service_types as $service_type)
                                            <option value="{{ $service_type->id }}" @if(old('service_type') == $service_type->id) selected @endif>{{ $service_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Información de contacto</legend>
                            <p>Contacto para procesos de contratación</p>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="contract_name">Nombre</label>
                                    <input type="text" name="contract_name" class="form-control" value="{{ old('contract_name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="contract_email">Correo electrónico</label>
                                    <input type="text" name="contract_email" class="form-control" value="{{ old('contract_email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="contract_cellphone">Celular</label>
                                    <input type="text" name="contract_cellphone" class="form-control" value="{{ old('contract_cellphone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="contract_phone">Teléfono</label>
                                    <input type="text" name="contract_phone" class="form-control" value="{{ old('contract_phone') }}">
                                </div>
                            </div>

                            <p>Contacto para pagos y/o actualización de datos</p>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="payment_name">Nombre</label>
                                    <input type="text" name="payment_name" class="form-control" value="{{ old('payment_name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_email">Correo electrónico</label>
                                    <input type="text" name="payment_email" class="form-control" value="{{ old('payment_email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="payment_cellphone">Celular</label>
                                    <input type="text" name="payment_cellphone" class="form-control" value="{{ old('payment_cellphone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_phone">Teléfono</label>
                                    <input type="text" name="payment_phone" class="form-control" value="{{ old('payment_phone') }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Experiencia profesional</legend>
                            <div class="form-group">
                                <label for="professional_profile" class="col-sm-3 control-label">Perfil profesional</label>
                                <div class="col-sm-9">
                                    <textarea name="professional_profile" class="form-control" placeholder="Detalle brevemente sus principales habilidades y rasgos de su personalidad.">{{ old('professional_profile') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="professional_experience" class="col-sm-3 control-label">Experiencia profesional</label>
                                <div class="col-sm-9">
                                    <textarea name="professional_experience" class="form-control" placeholder="Indique aquí el tiempo y las principales funciones que realizó como experiencia y/o trabajos realizados.">{{ old('professional_experience') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="professional_education" class="col-sm-3 control-label">Educación</label>
                                <div class="col-sm-9">
                                    <textarea name="professional_education" class="form-control" placeholder="Indicar nivel de educación primaria y superior. Asimismo, indicar el lugar donde se realizó.">{{ old('professional_education') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="professional_specialty" class="col-sm-3 control-label">Especialidad</label>
                                <div class="col-sm-9">
                                    <textarea name="professional_specialty" class="form-control" placeholder="Indicar el área y/o servicio donde tiene mayor experiencia y conocimiento.">{{ old('professional_specialty') }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Evaluación psicológica</legend>
                            <div class="form-group">
                                <label for="psychologist_comments" class="col-sm-3 control-label">Comentarios del psicólogo</label>
                                <div class="col-sm-9">
                                    <textarea name="psychologist_comments" class="form-control" placeholder="Comentarios realizados por el psicólogo.">{{ old('psychologist_comments') }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Cuenta de usuario</legend>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">E-mail</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                    <p class="text-muted">Este dato se usarán para acceder al sistema y recibir notificaciones.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Contraseña</label>
                                <div class="col-sm-9">
                                    <input type="text" name="password" class="form-control" value="{{ old('password') ?: str_random(8) }}">
                                    <p class="text-muted">El proveedor podrá cambiar su contraseña la primera vez que ingrese.</p>
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn btn-success pull-right">Registrar nuevo proveedor</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/providers/create.js') }}"></script>
@endsection
