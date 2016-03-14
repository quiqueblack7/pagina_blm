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
    <script src="ajax.js" language="JavaScript"></script>
    <div id="ven">
        <table border="0px" cellpadding="0" cellspacing="0" >
            <tr>
                <td><div id="ccliente">Agregar cliente</div><a id="enlace1"> <img src="images/alta.png" width="55px" height="70px"  href="alta.php" > </a> </td>
                <td><div id="ccliente">Borrar <br>cliente</div><a id="enlace2"> <img src="images/baja.png" width="55px" height="70px" href="baja.php"></a></td>
                <td><div id="ccliente">Modificar cliente</div><a id="enlace3"> <img src="images/cambio.png" width="55px" height="70px" href="cambio.php"></a> </td>
                <td><div id="ccliente">Visualizar cliente</div><a href="cat_clientes.php"> <img src="images/ver_c.png" width="55px" height="70px"   > </a></td>
            </tr>
        </table>
    </div>
    <div id="detalles">


    </div>

</html>
