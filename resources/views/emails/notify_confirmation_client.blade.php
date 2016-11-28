@extends('layouts.mail')

@section('content')
<h1>Hola, {{ $name }}</h1>
<p>Te escribimos de <strong>QuickDeal</strong> para informarte que has aprobado con éxito el servicio del proveedor.</p>
<p><a href="{{ url('/requirements') }}">Ingresa a la plataforma</a> para que puedas ver tus requerimientos y el estado de cada uno de ellos.</p>
<p>Recuerda que el funcionamiento es el siguiente:</p>
<ul>
    <li>Cuando publicas un nuevo requerimiento, los proveedores correspondientes son informados.</li>
    <li>Cuando un proveedor aplica a tu requerimiento te comunicamos, y tú decides si confirmar o no.</li>
    <li>Justo ahora acabas de confirmar el servicio, por lo que ya puedes ver los datos de contacto en la plataforma.</li>
</ul>

<p>¡ Hasta la próxima !</p>

<hr>

<p>Si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
@endsection