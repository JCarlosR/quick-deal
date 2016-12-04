@extends('layouts.mail')

@section('content')
<h3>Hola, {{ $name }}</h3>
<p>Te escribimos de <strong>QuickDeal</strong> para informarte que se ha publicado una nueva solicitud de servicio en la categoría de {{ $service_type }}.</p>
<p><a href="{{ url('/apply') }}">Ingresa a la plataforma</a> para que puedas ver todos los requerimientos que se han publicado en tu categoría.</p>
<p>Recuerda que el funcionamiento es el siguiente:</p>
<ul>
    <li>Cuando un usuario publica un nuevo requerimiento en tu categoría, eres informado.</li>
    <li>Si aplicas al requerimiento, el usuario es informado y tendrá la opción de confirmar tu aplicación.</li>
    <li>Si el usuario acepta luego de ver tu perfil, serás informado y podrán iniciar con el proyecto.</li>
</ul>

<p>Si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
<p>¡ Hasta la próxima !</p>
@endsection