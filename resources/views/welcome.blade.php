@extends('layouts.app')

@section('content')
<div class="container" id="container-welcome">
    <img src="{{ asset('dist/theme/images/2.png') }}" alt="Image 2">

    <div class="divider-quick"></div>

    <div class="row-quick">
        <img src="{{ asset('dist/theme/images/3.png') }}" alt="Image 3">
        <article class="inline-block" id="article-start">
            <h1 class="font-quick">
                <b>BUSCA A LOS MEJORES <br> CON TAN SOLO UN CLICK</b>
            </h1>

            <h1 class="font-quick">COMIENZA TU EXPERIENCIA VIENDO <br> NUESTROS SERVICIOS AGENCY</h1>

            <button class="btn-quick">
                <b>CLICK AQUÍ</b>
            </button>
        </article>
    </div>

    <div class="divider-quick"></div>

    <article class="inline-block" id="article-categories">

        <h1 class="font-quick">Servicio de asistencia con los mejores profesionales</h1>

        <p class="font-quick-black">
            Quick Deal, ofrece una búsqueda de los principales requerimientos de servicios de asistencia doméstica de cada usuario.
            Ofrece un rápido uso.
            Con tan sólo un click, podrás separar a uno de nuestros socios estratégicos para que te puedan brindar el servicio que necesitas.
            Ofrecemos cuatro tipos de servicio:
        </p>

        <ul class="list-quick font-quick-black">
            <li>Mozo</li>
            <li>Gasfitería</li>
            <li>Reparación de Electrodoméstricos y Equipos</li>
            <li>Jardinería</li>
        </ul>

    </article>

    <img src="{{ asset('dist/theme/images/4.png') }}" alt="Image 4">

    <div class="divider-quick"></div>

    <div class="strange-blocks" id="quienes-somos">
        <img src="{{ asset('dist/theme/images/5.png') }}" alt="Image 5" class="align-left">

        <article id="article-who" class="align-left">
            <div>
                <p class="font-quick-black">
                    <span class="hat-quick">Quick Deal</span> es una empresa creada en el 2015.
                    Cuenta con una gran red de socios estratégicos que cumplen con los requisitos
                    indispensables para poder realizar el servicio con calidad.
                </p>
            </div>
            <div>
                <button class="btn-quick">
                    <b>¿QUIÉNES <br> SOMOS?</b>
                </button>
            </div>
        </article>

        <div id="square-logo" class="align-left">
            <p>QUICK <br> DEAL</p>
        </div>

        <article id="article-our" class="align-left">
            <h1 class="font-quick">Nuestra misión</h1>
            <p class="font-quick-black">
                Mejorar el nivel de atención y respuesta de los principales
                servicios de asistencia domésticos para el usuario.<br>
                Brindando un servicio de confianza y calidad.
            </p>

            <h1 class="font-quick">Nuestra visión</h1>
            <p class="font-quick-black">
                Ser la principal herramienta de búsqueda y prestación de
                servicios de asistencia establecidos.
            </p>
        </article>

        <img src="{{ asset('dist/theme/images/6.png') }}" alt="Image 6" class="align-left">
    </div>

    <div class="divider-quick" id="nuestros-servicios"></div>

    <img src="{{ asset('dist/theme/images/7.png') }}" alt="Image 7">

    <div class="row" id="article-bottom">
        <div class="col-md-3">
            <img src="{{ asset('dist/theme/images/categories/1.png') }}" alt="Mozo">
            <h3 class="font-quick">Mozo</h3>
            <p class="font-quick-black">Servicio de mozos especializados. Cuentan con una amplia experiencia en eventos.</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('dist/theme/images/categories/2.png') }}" alt="Gasfitería">
            <h3 class="font-quick">Gasfitería</h3>
            <p class="font-quick-black">Gasfiteros con servicio a domicilio. En este tipo de opción, es necesario solicitar cotización.</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('dist/theme/images/categories/3.png') }}" alt="Reparación de Electrodomésticos">
            <h3 class="font-quick">Reparación de Electrodomésticos</h3>
            <p class="font-quick-black">
                Personal capacitado para reparáción de radios, televisores, equipos de sonido y electrodomésticos.
                Es necesario solicitar cotización.
            </p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('dist/theme/images/categories/4.png') }}" alt="Jardinería">
            <h3 class="font-quick">Jardinería</h3>
            <p class="font-quick-black">
                Jardineros con amplia experiencia y con diferentes tipos de requerimiento.
                Es necesario solicitar cotización.
            </p>
        </div>
    </div>
</div>
<div class="container" id="container-footer">
    <div class="row" id="article-footer">
        <div class="col-md-3">
            <h3 class="font-quick-white">Links de interés</h3>
            <ul class="list-quick-white font-quick-white">
                <li>¿Cómo usar la página?</li>
                <li>¿Quieres ser parte del equipo Quick Deal?</li>
                <li>Tipos de servicio</li>
            </ul>

        </div>
        <div class="col-md-6">
            <h3 class="font-quick-white">Horario de atención</h3>
            <p class="font-quick-white">
                El horario de atención de nuestros servicios de asistencia es de Lunes
                a Viernes de 8:00am a 8:00pm (horario establecido). <br>
                Ante cualquier caso de emergencia o previo acuerdo pactado, se
                considerará una excepción.
            </p>
        </div>
        <div class="col-md-3">
            <h3 class="font-quick-white">Contacto</h3>
            <p class="font-quick-white">informes@quickdeal.com</p>
        </div>
    </div>
</div>
@endsection
