<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quick Deal</title>

    <!-- Styles -->
    <style>
        .font-quick {
            font-family: "Agency FB", sans-serif;
            font-size: 18px;
        }
        .text-center {
            text-align: center;
        }
        .divider-quick {
            background: rgb(0, 169, 157);
            height: 4px;
        }
    </style>
</head>
<body class="font-quick">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <h2>Quick Deal</h2>
                {{--<img src="{{ asset('dist/theme/images/logo-home.png') }}" alt="Logo Quick Deal" class="img-center" height="100">--}}
            </td>
        </tr>
    </table>
    @yield('content')

    <div class="divider-quick"></div>

    <p class="text-center">
        atentamente el equipo de Quick Deal <br>
        wwww.quickdeal.com
    </p>

    <!-- JavaScripts -->
    @yield('scripts')
</body>
</html>
