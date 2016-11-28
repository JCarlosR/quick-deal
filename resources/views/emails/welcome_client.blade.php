@extends('layouts.mail')

@section('content')
<h3 class="text-left">Hola, {{ $name }}</h3>
<p>Bienvenido a <b>Quickdeal.Pe</b>, la página que te ayudará a encontrar a los mejores profesionales con tan solo un click. Te mostramos una breve instrucción de cómo funciona:</p>

<p class="text-left">
    <b>Paso 1:</b> Selecciona el tipo de servicio, fecha y hora que deseas.
</p>
<p class="text-left">
    <b>Paso 2:</b> Recibirás un mail de confirmación por parte de uno de nuestros proveedores interesados en realizar el servicio que requieres.
</p>
<p class="text-left">
    <b>Paso 3:</b> Evalúa sus datos personales, experiencia profesional y verifica los comentarios de nuestros sicólogos. Darle click en “confirmar” si deseas que el proveedor realice el servicio, caso contrario, colocar en “cancelar” para que otro de nuestros proveedores pueda visualizar tu requerimiento.
</p>
<p class="text-left">
    <b>Paso 4:</b> Con la confirmación, liberaremos el correo electrónico y tu número brindado en la página para que el proveedor se contacte contigo de manera directa.
</p>

<br>
<p>
    <a href="{{ url('/request') }}">Ingresa a la plataforma</a> para que puedas publicar tu primer requerimiento.
</p>

<p>Recuerda que en cada etapa recibirás un email de notificación.</p>
Reiteramos nuestro compromiso de dar un servicio de calidad y amigable. Estamos agradecidos de darnos tu confianza para buscar al mejor proveedor para realizar tu requerimiento.
<hr>
<p>Si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
@endsection
