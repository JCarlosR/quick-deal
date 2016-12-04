@extends('layouts.mail')

@section('content')
<h3>Hola, {{ $name }}</h3>
<p>Te escribimos de <strong>QuickDeal</strong> para informarte que has aplicado correctamente al requerimiento del cliente {{ $client }}.</p>
<p><a href="{{ url('/applications') }}">Ingresa a la plataforma</a> para que puedas ver el historial de tus aplicaciones, y el estado de cada una de ellas.</p>
<p>Recuerda que el funcionamiento es el siguiente:</p>
<ul>
    <li>Eres informado cada vez que se publica un nuevo requerimiento en tu categoría.</li>
    <li>Desde la plataforma puedes aplicar a un requerimiento, tal cual hiciste ahora.</li>
    <li>Finalmente el cliente deberá confirmar que está interesado en tus servicios.</li>
</ul>

<p>Si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
@endsection
