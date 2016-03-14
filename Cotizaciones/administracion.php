<?php
session_start();
if ($_SESSION['permiso'] == 2) {
    header('Location: ventas.php');
}

if (isset($_SESSION['cotizacion'])) {
    $cotizacion = 1;
} else {
    $cotizacion = 0;
}

if (!isset($_GET['sec']))
    $seccion = null;
else
    $seccion = $_GET['sec'];

//Capturamos el usuario autenticadO
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

$id_usuario = $_SESSION['usuario'];




//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

//Seleccionamos el nombre de la persona que ingresó
$sql = "SELECT `nombre`,`apellido_p` FROM `Usuarios` WHERE `id_usuario` = '$id_usuario'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $nombre = $campo['nombre'];
    $apellido_p = $campo['apellido_p'];
}

$no_version = 1;

$sql = "SELECT version FROM Version WHERE version_no='$no_version'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $version = $campo['version'];
}
?>
<!DOCTYPE html >
<html>
    <head>
        <title>P&aacute;gina principal</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="Fondo.css" rel="stylesheet" type="text/css" />
    </head>

    <script>
        function agregar_c() {
            location.href = "?sec=alta";
        }
        function eliminar_c() {
            location.href = "?sec=baja";
        }
        function modificar_c() {
            location.href = "?sec=cambio";
        }
        function visualizar_c() {
            location.href = "cat_clientes.php";
        }
        function cotizaciones() {
            location.href = "?sec=cotizaciones";
        }
        function cotizar() {
            location.href = "?sec=cotizar";
        }
        function agregar_u() {
            location.href = "?sec=altaus";
        }
        function eliminar_u() {
            location.href = "?sec=bajaus";
        }
        function modificar_u() {
            location.href = "?sec=cambious";
        }
        function agregar_p() {
            location.href = "?sec=alta_p";
        }
        function eliminar_p() {
            location.href = "?sec=baja_p";
        }
        function modificar_p() {
            location.href = "?sec=cambio_p";
        }
        function ver_p() {
            location.href = "cat_prod.php";
        }



    </script>








    <body>
        <div id="page">

            <div id="header">
                <img id="alsa" src="images/logoe1-2.png" width="120px">
                <h1> <style> h1 {margin-left: 200px;}</style>Best Light México S.A. de C.V.</h1>
                <a  href="cerrar_sesion.php"><button id="boton_cerrar">Cerrar Sesión</button></a>


            </div>

            <div id="main">
                




                <!-- sidebar / IZQUIERDA -->
                <div id="sidebar">
                    <h2> Men&uacute;</h2>
                    <div align="left"></div>

                    <div id="menu2" style="margin-top: 100px;">
                        <ul>
                            <li>  <img src="images/1clientes.png" width="20px"><span><?php
                                    if ($seccion == "alta" || $seccion == "baja" || $seccion == "cambio") {
                                        echo "<div id=seleccion>";
                                    }
                                    ?>Clientes <?php
                                    if ($seccion == "alta" || $seccion == "baja" || $seccion == "cambio") {
                                        echo "</div>";
                                    }
                                    ?></span> 
                                <ul>
                                    <li onclick="agregar_c()"><img src="images/2anadir.png" width="20px"><span >Agregar cliente</span> </li>
                                    <li onclick="eliminar_c()"><img src="images/1eliminar.png" width="20px"><span>Eliminar cliente</span></li>
                                    <li onclick="modificar_c()"><img src="images/1modificar.png" width="20px"><span>Modificar cliente</span></li>
                                    <li onclick="visualizar_c()"><img src="images/1ver.png" width="20px"><span>Visualizar clientes</span></li>
                                </ul>               
                            </li> 


                            <li onclick="cotizaciones()"><img src="images/1cotizaciones.png" width="20px"><span><?php
                                    if ($seccion == "cotizaciones") {
                                        echo "<div id=seleccion>";
                                    }
                                    ?>Cotizaciones <?php
                                    if ($seccion == "cotizaciones") {
                                        echo "</div>";
                                    }
                                    ?></span></li>

                            <li onclick="cotizar()"><img src="images/1generar.png" width="20px"><span><?php
                                    if ($seccion == "cotizar") {
                                        echo "<div id=seleccion>";
                                    }
                                    ?>Generar cotizaci&oacute;n <?php
                                    if ($seccion == "cotizar") {
                                        echo "</div>";
                                    }
                                    ?></span></li>


                            <li><img src="images/1usuarios.png" width="15px"><span><?php
                                    if ($seccion == "altaus" || $seccion == "bajaus" || $seccion == "cambious") {
                                        echo "<div id=seleccion>";
                                    }
                                    ?>Usuarios <?php
                                    if ($seccion == "altaus" || $seccion == "bajaus" || $seccion == "cambious") {
                                        echo "</div>";
                                    }
                                    ?></span>
                                <ul>
                                    <li onclick="agregar_u()"><img src="images/2anadir.png" width="20px"><span>Agregar usuario</span></li>
                                    <li onclick="eliminar_u()"><img src="images/1eliminar.png" width="20px"><span>Eliminar usuario</span></li>
                                    <li onclick="modificar_u()"><img src="images/1modificar.png" width="20px"><span>Modificar usuario</span></li>
                                </ul>       
                            </li>

                            <li><img src="images/1productos.png" width="17px"><span> <?php
                                    if ($seccion == "alta_p" || $seccion == "baja_p" || $seccion == "cambio_p") {
                                        echo "<div id=seleccion>";
                                    }
                                    ?>Productos <?php
                                    if ($seccion == "alta_p" || $seccion == "baja_p" || $seccion == "cambio_p") {
                                        echo "</div>";
                                    }
                                    ?></span>
                                <ul>
                                    <li onclick="agregar_p()"><img src="images/2anadir.png" width="20px"><span>Agregar producto</span></li>
                                    <li onclick="eliminar_p()"><img src="images/1eliminar.png" width="20px"><span>Eliminar producto</span></li>
                                    <li onclick="modificar_p()"><img src="images/1modificar.png" width="20px"><span>Modificar producto</span></li>
                                    <li onclick="ver_p()"><img src="images/1ver.png" width="20px"><span>Visualizar productos</span></li>
                                </ul>       
                            </li>
                        </ul>
                    </div>




                </div>
                <!-- FIN sidebar / IZQUIERDA -->






                <!-- content / DERECHA-->
                <div id="content">
                    <div class="post">
                        <h2 align="center">Bienvenido(a) <?php echo "$nombre " . "$apellido_p"; ?>  </h2>

                        <?php
                        if ($seccion == null) {
                            require_once("home.php");
                        }

                        if ($seccion == "alta") {
                            require_once("alta.php");
                        }
                        if ($seccion == "baja") {
                            require_once("baja.php");
                        }
                        if ($seccion == "cambio") {
                            require_once("cambio.php");
                        }

                        if ($seccion == "cotizaciones") {
                            require_once("cotizaciones-admin.php");
                        }

                        if ($seccion == "cotizar") {
                            require_once("cotizar_ad.php");
                        }

                        if ($seccion == "altaus") {
                            require_once("altaus.php");
                        }
                        if ($seccion == "bajaus") {
                            require_once("bajaus.php");
                        }
                        if ($seccion == "cambious") {
                            require_once("cambious.php");
                        }

                        if ($seccion == "alta_p") {
                            require_once("alta_p.php");
                        }
                        if ($seccion == "baja_p") {
                            require_once("baja_p.php");
                        }
                        if ($seccion == "cambio_p") {
                            require_once("cambio_p.php");
                        }

                        if ($seccion == "creditos") {
                            require_once("creditos.php");
                        }
                        if ($seccion == "version") {
                            require_once("version.php");
                        }
                        ?>    		

                    </div>
                </div>
                <!-- FIN content / DERECHA-->





                <div class="clearing">&nbsp;</div>                
            </div>
            <!-- FIN main -->

        </div><!--FIN page -->
    </body>
    <div id="letraversion">Versi&oacute;n <?php echo $version; ?></div>
    <div align="center">
        <div  class="foot">
            <br>Hecho en M&eacute;xico, todos los derechos reservados a Artefactos Lum&iacute;nicos S.A. de C.V. 2015<br> 
            <a href="?sec=creditos" id="boton_creditos">Cr&eacute;ditos</a><br><br>
        </div>
    </div>
<?php
if ($id_usuario == 'sistemas') {
    ?>
        <div id="boton_version"><a href="?sec=version" >Cambiar</a></div>

<?php }
?>
</html>






<?php
if ($cotizacion == 1) {

    echo'<script>';

    echo'    var r = confirm("Se ha generado una cotizacion, deseas continuarla?");';
    echo'    if (r == true) {';
    echo'	location.href="partidas.php";';

    echo'    } else {';

    echo'location.href="cancelar.php"; ';
    echo'    }';


    echo'</script>';
}
?>
