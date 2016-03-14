<?php
session_start();

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
    <div id=producto>Visualizar Catálogo </div>
    <div id="ven">
        <a id="enlace1"> <img src="images/ver.png" width="50px"  href="cat_prod.php" > </a>
        <div id="detalles">


        </div>
</html>
