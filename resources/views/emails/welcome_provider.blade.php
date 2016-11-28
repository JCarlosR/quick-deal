@extends('layouts.mail')

@section('content')
<h1>Hola, {{ $name }}</h1>
<p>Te damos la bienvenida a nuestra plataforma <b>Quickdeal</b>. En esta podrás verificar y confirmar los servicios que deseas en la hora y fecha que requiere el cliente.</p>

<p>Esta es tu contraseña generada por defecto:</p>
<h2>{{ $default_password }}</h2>
<p><a href="{{ url('/applications') }}">Ingresa a la plataforma</a> para que puedas cambiar tu contraseña que será personal.

<p>Nos contactaremos contigo para brindarte toda la asesoría e información que necesitas para emprender tu negocio.</p>
<p>Muchos éxitos !</p>
<hr>
<p>Si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
@endsection
