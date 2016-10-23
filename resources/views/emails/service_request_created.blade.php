<h1>Hola, {{ $serviceRequest->user->name }}</h1>
<p>Te escribimos de <strong>QuickDeal</strong> para informarte que tu solicitud de servicio se ha publicado correctamente.</p>
<p>Tu solicitud ha sido enviada a los proveedores destacados en el servicio que escogiste: <strong>{{ $serviceRequest->service_type->name }}</strong>.</p>
<ul>
    <li>Cuando un proveedor haya aplicado a tu solicitud, serás informado a través de otro correo.</li>
    <li>Y cuando ello ocurra, podrás ver los datos principales del proveedor y decidir si aprobar o no este servicio.</li>
    <li>Si no aceptas al proveedor que aplicó, otro proveedor interesado puede aplicar nuevamente y repetir el proceso.</li>
</ul>

<p>Para más información, ingresa a la plataforma.</p>
<hr>
<p>Y recuerda, si tienes alguna duda puedes escribirnos a admin@quickdeal.pe</p>
