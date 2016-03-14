<!DOCTYPE html >
<html>
    <head>
        <title>ERROR</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="page">
            <div id="header">
                <h1>Artefactos Lumínicos SA de CV</h1>

            </div>

            <div id="main">
                <div class="ic"></div>

                <?php
                session_start();

                if (!isset($_SESSION['usuario'])) {
                    header('Location: log_in.php');
                }
                session_destroy();
                ?>

                <script type="text/javascript">
                    function regresar() {
                        alert("ERROR\nUsuario y/o contraseña erroneos, intente de nuevo");
                        document.location.href = 'log_in.php';
                    }
                    regresar()
                </script>

                </html>
