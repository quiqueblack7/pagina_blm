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
/*
//Capturamos el usuario autenticadO
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
*/
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

<!DOCTYPE html >

<html>
    <head>
		<link rel="icon" type="image/png" href="images/ico.png" />
        <title>P&aacute;gina principal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="stylenuevo.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
	
		<div id="encabezado_negro">
			<a href="http://www.bestlightmexico.com.mx" target="new"><img src="images/logo_encabezado.png" id="logo_encabezado"></a>
			
			<div class="linea_vertical"></div>
			
			<a href="administracion2.php"><img src="images/1home.png" class="iconoi_encabezado"></a>
			
			<div id="iconos">
			
			
				<img onclick="cotizar()" src="images/1generar.png" class="icono_encabezado">
				<div class="linea_verticalfd"></div>
				
				<img onclick="cotizaciones()" src="images/1cotizaciones.png" class="icono_encabezado">
				<div class="linea_verticalfd"></div>			
				
				<div class="mover">
				
					<img src="images/1clientes.png" class="icono_encabezado clientes">
					
					<div class="agregar">
							<img onclick="agregar_c()" src="images/2anadir.png" class="icono_encabezado agregar">
					</div>
					
					<div class="eliminar">
							<img onclick="eliminar_c()" src="images/1eliminar.png" class="icono_encabezado agregar">
					</div>
					
					<div onclick="modificar_c()" class="modificar">
							<img src="images/1modificar.png" class="icono_encabezado agregar">
					</div>
					
					<div class="visualizar">
							<img onclick="visualizar_c()" src="images/1ver.png" class="icono_encabezado agregar">
					</div>
						
				</div>
				<div class="linea_verticalfd"></div>
				
				<div class="mover2">
				
				<img src="images/1usuarios.png" class="icono_encabezado">
				
					<div class="agregar">
							<img onclick="agregar_u()" src="images/2anadir.png" class="icono_encabezado agregar">
					</div>
					
					<div class="eliminar">
							<img onclick="eliminar_u()" src="images/1eliminar.png" class="icono_encabezado agregar">
					</div>
					
					<div class="modificar">
							<img onclick="visualizar_u()" src="images/1modificar.png" class="icono_encabezado agregar">
					</div>
				
				</div>
				<div class="linea_verticalfd"></div>
				
				<div class="mover">
				
				<img src="images/1productos.png" class="icono_encabezado">
				
					<div class="agregar">
							<img onclick="agregar_p()" src="images/2anadir.png" class="icono_encabezado agregar">
					</div>
					
					<div class="eliminar">
							<img onclick="eliminar_p()" src="images/1eliminar.png" class="icono_encabezado agregar">
					</div>
					
					<div class="modificar">
							<img onclick="modificar_p()" src="images/1modificar.png" class="icono_encabezado agregar">
					</div>
					
					<div class="visualizar">
							<img onclick="ver_p()" src="images/1ver.png" class="icono_encabezado agregar">
					</div>
				
				</div>
				<div class="linea_verticalfd"></div>
				
				<img src="images/1sesion.png" class="icono_encabezado">
			</div>
		</div>
		
		                <!-- content / DERECHA-->
                <div id="content">
                    <div class="post">                        

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
	
    </body>
	
</html>

