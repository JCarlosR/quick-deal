<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading">Atajos</div>

        <div class="panel-body">
            <ul>
                <li><a href="{{ url('/home') }}">Solicita un servicio</a></li>
                <li><a href="{{ url('/requirements') }}">Tus requerimientos</a></li>
                @if (Auth::user()->is_admin)
                <li><a href="{{ url('/providers') }}">Proveedores</a></li>
                @endif
                <li><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</div>