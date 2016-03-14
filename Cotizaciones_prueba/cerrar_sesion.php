<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
?>
<!DOCTYPE html >
<html>
    <head>
        <title>Consecutivo de Cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="page">
            <div id="header">
                <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>
            </div>

            <div id="main">
                <div class="ic"></div>

                <script>
                    function myFunction() {
                        if (confirm("¿ Realmente desea cerrar sesion ?"))
                        {
                            document.location.href = 'cerrarsesion2.php';
                        }

                        else
                        {
                            document.location.href = 'ventas.php';

                        }
                    }

                    myFunction()
                </script>

                </body>
                </html>
