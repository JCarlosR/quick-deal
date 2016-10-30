<div class="col-md-3">
    <div class="panel panel-success">
        <div class="panel-heading">Atajos</div>

        <div class="panel-body">
            <ul>
                @if (auth()->user()->provider)
                <li><a href="{{ url('/apply') }}">Aplica a un servicio</a></li>
                <li><a href="{{ url('/applications') }}">Tus aplicaciones</a></li>
                @else
                <li><a href="{{ url('/request') }}">Solicita un servicio</a></li>
                <li><a href="{{ url('/requirements') }}">Tus requerimientos</a></li>
                @endif
                @if (auth()->user()->is_admin)
                <li><a href="{{ url('/providers') }}">Proveedores</a></li>
                @endif
                <li><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</div>
