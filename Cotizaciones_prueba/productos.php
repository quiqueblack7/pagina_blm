<?php
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
if (!isset($_GET['op']))
    $seccion = null;
else
    $seccion = $_GET['op'];
?>

<html>
    <head>
        <title>Consecutivo de cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <script src="ajax.js" language="JavaScript"></script>

    <div id="ven">
        <br>
        <table border="0px" cellpadding="0" cellspacing="0" >
            <tr>
                <td aling="left"><div id="producto">Agregar producto</div><a id="enlace1"> <img src="images/alta_p.png" width="55px" height="90px"  href="alta_p.php" > </a> </td>
                <td aling="left"><div id="producto">Borrar producto</div><a id="enlace2"> <img src="images/baja_p.png" width="55px" height="90px" href="baja_p.php"></a></td>
                <td aling="left"><div id="producto">Modificar producto</div><a id="enlace3"> <img src="images/cambio_p.png" width="55px" height="90px" href="cambio_p.php"></a> </td>
                <td aling="left"><div id="producto">Visualizar cat&aacute;logo</div><a href="cat_prod.php"> <img src="images/ver.png" width="55px" height="90px"   > </a></td>
            </tr>
        </table>
    </div>
    <div id="detalles">


    </div>

</html>
