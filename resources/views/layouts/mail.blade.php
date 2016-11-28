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
                @yield('content')

                <div class="divider-quick"></div>

                <p class="text-center">
                    atentamente el equipo de Quick Deal <br>
                    wwww.quickdeal.pe
                </p>
                <img src="{{ asset('dist/mail/services.png') }}" alt="Services Quick Deal" class="img-center">
                <img src="{{ asset('dist/mail/footer.png') }}" alt="Footer Quick Deal" class="img-center">
            </td>
        </tr>
    </table>

    <!-- JavaScripts -->
    @yield('scripts')
</body>
</html>
