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
    <div id=usuario>Agregar usuario </div>
    <div id=usuario> Borrar usuario</div>
    <div id=usuario>Modificar usuario </div>
    <div id="ven">
        <a id="enlace1"> <img src="images/alta2.png" width="80px"  href="altaus.php" > </a>
        <a id="enlace2"> <img src="images/baja2.png" width="80px" href="bajaus.php"></a>
        <a id="enlace3"> <img src="images/cambio2.png" width="80px" href="cambious.php"></a>
    </div>
    <div id="detalles">


    </div>

    <script>
        function Password() {

            var p1 = document.getElementById("passwd").value;
            var p2 = document.getElementById("passwd2").value;
            var caract_invalido = " ";
            var caract_longitud = 6;

            if (p1.length < caract_longitud) {
                alert('Tu clave debe constar de ' + caract_longitud + ' caracteres.');
                return false;
            }

            if (p1.indexOf(caract_invalido) > -1) {
                alert("Las claves no pueden contener espacios");
                return false;
            }

            if (p1 != p2) {
                alert("Las contraseñas deben coincidir");
                return false;
            }
            else {

                return true;

            }

        }


    </script>



</html>



