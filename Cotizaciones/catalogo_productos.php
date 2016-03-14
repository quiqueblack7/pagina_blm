<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

if (!isset($_GET['opcion']))
    $opcion = "nada";
else
    $opcion = $_GET['opcion'];

if (!isset($_POST['producto']))
    $producto = "nada";
else
    $producto = $_POST['producto'];

if (!isset($_POST['descripcion']))
    $descripcion = "nada";
else
    $descripcion = $_POST['descripcion'];
?>
<head>
    <title>Catálogo de Productos</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link href="tabla.css" rel="stylesheet" type="text/css" />
</head>
<body>


    <div style="margin-left:450px;" id=tform>
        <img align="center" src="images/logoe1-2.png" width="120" height="100">
        CATALOGO DE PRODUCTOS
    </div>

    <div align="center" style="margin-top:30px;">
        <table cellspacing="30px" border=0>

            <tr><td valign="top" > 
                    Mostrar todo:
                    <br><br>
                    <a href="catalogo_productos.php?opcion=todo"><input type="button" value="Mostrar Todo"></a> 
                </td>


                <td valign="top"  > 
                    Buscar por catalogo:
                    <br><br>
                    <form action="catalogo_productos.php" method="POST">
                        <input type=text name=producto required> 
                        <input type=submit value="Buscar">
                    </form>
                </td>

                <td valign="top"  > 
                    Buscar por descripción:
                    <br><br>
                    <form action="catalogo_productos.php" method="POST">
                        <input type=text name=descripcion required> 
                        <input type=submit value="Buscar">
                    </form>
                </td>

                <td valign="top">
                    Salir:
                    <br><br>
                    <input name="button" type="button" onclick="window.close();" value="Salir" />
                </td></tr>

        </table>

    </div>



    <?php
    if ($opcion == "todo") {
        include("catalogo.php");
    }

    if ($producto != "nada") {
        include("busqueda.php");
    }

    if ($descripcion != "nada") {
        include("busqueda2.php");
    }
    ?>

</body>


