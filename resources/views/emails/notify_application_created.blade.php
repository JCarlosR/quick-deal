@extends('layouts.mail')

@section('content')
<h3>Hola, {{ $name }}</h3>
<p>Te escribimos de <strong>QuickDeal</strong> para informarte que un proveedor se ha interesado en tu requerimiento y ha aplicado al mismo.</p>
<p><a href="{{ url('/requirements') }}">Ingresa a la plataforma</a> para que puedas ver tus requerimientos y el estado de cada uno de ellos.</p>
<p>Recuerda que el funcionamiento es el siguiente:</p>
<ul>
    <li>Cuando publicas un nuevo requerimiento, los proveedores correspondientes son informados.</li>
    <li>Cuando un proveedor aplica a tu requerimiento te comunicamos, como ocurre justo ahora.</li>
    <li>En la plataforma podrás confirmar tu conformidad con el proveedor e iniciar con el proyecto.</li>
</ul>

<p>Si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
<p>¡ Hasta la próxima !</p>
@endsection
