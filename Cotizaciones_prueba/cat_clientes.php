<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    ?> 
    <?php header('Location: cerrar_sesion.php'); ?>

    <div id="detalles">
    </div>  <?php
} else {

    if (!isset($_GET['opcion']))
        $opcion = "nada";
    else
        $opcion = $_GET['opcion'];

    if (!isset($_POST['rfc']))
        $rfc = "nada";
    else
        $rfc = $_POST['rfc'];

    if (!isset($_POST['empresa']))
        $empresa = "nada";
    else
        $empresa = $_POST['empresa'];
    ?>
    <head>
        <title>Clientes</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="tabla.css" rel="stylesheet" type="text/css" />
    </head>
    <body>


        <div style="margin-left:450px;" id=tform>
            <img align="center" src="images/logoe1-2.png" width="80">
            Herramienta de visualizacion de clientes
        </div>

        <div align="center" style="margin-top:30px;">
            <table cellspacing="30px" border=0>

                <tr><td valign="top" > 
                        Mostrar todo:
                        <br><br>
                        <a href="cat_clientes.php?opcion=todo"><input type="button" value="Mostrar Todo"></a> 
                    </td>


                    <td valign="top"  > 
                        Buscar por rfc:
                        <br><br>
                        <form action="cat_clientes.php" method="POST">
                            <input type=text name=rfc required> 
                            <input type=submit value="Buscar">
                        </form>
                    </td>

                    <td valign="top"  > 
                        Buscar por nombre de la empresa:
                        <br><br>
                        <form action="cat_clientes.php" method="POST">
                            <input type=text name=empresa required> 
                            <input type=submit value="Buscar">
                        </form>
                    </td>

                    <td valign="top">
                        Salir:
                        <br><br>
                        <a href="administracion.php?sec=clientes">
                            <input name="button" type="submit" value="Salir" /></a>
                    </td></tr>

            </table>

        </div>



        <?php
        if ($opcion == "todo") {
            include("catalogo_clientes.php");
        }

        if ($rfc != "nada") {
            include("busqueda_clientes.php");
        }

        if ($empresa != "nada") {
            include("busqueda_clientes2.php");
        }
    }
    ?>

</body>
