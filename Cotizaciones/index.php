<?php
	session_start();

	//incluimos el archivo con las funciones

	include ("funciones_mysql.php");

	//Funcion que conecta la base de datos

	$conexion = conectar();

	$atras="nada";

	if (!isset($_GET['sec']))
		$seccion = null;

	else
		$seccion = $_GET['sec'];


	if (!isset($_SESSION['usuarioc']))
		$id_usuario = null;

	else
		$id_usuario = $_SESSION['usuarioc'];


	if (!isset($_SESSION['permiso']))
		$permiso = NULL;

	else
		$permiso = $_SESSION['permiso'];

	if (isset($_GET['catalogo']))
		$seccion = "baja_p";

	if (isset($_GET['nombreBajaUs']))
		$seccion = "bajaus";

	if (isset($_GET['catalogoCambio']))
		$seccion = "cambioproducto";

	if (isset($_GET['nombreCambio']))
		$seccion = "cambiousuario";

	if(isset($_GET['busquedaProductoDescripcion']))
	{
		$seccion = "verP";
		$busquedaProductoDescripcion = $_GET['busquedaProductoDescripcion'];
	}
	 if (isset($_GET['busquedaProductoCatalogo']))
	 {
		$seccion = "verP";
 		$busquedaProductoCatalogo = $_GET['busquedaProductoCatalogo'];
	 }

  if(isset($_GET['empresaBuscar'])) {
    $seccion = "empresaBuscar";
  }



if (isset ($id_usuario))
{
	$sql = "SELECT * FROM Usuarios WHERE id_usuario = '$id_usuario'";
	$resultado = query($sql, $conexion);
	while ($campo = mysql_fetch_array($resultado))
	{
		$nombre = $campo['nombre'];
		$apellido_p = $campo['apellido_p'];
	}
	$nombreCompleto = $nombre. " " .$apellido_p;
}

?>

<!doctype html >

<html lang="es-MX">
	<head>
		<link rel="icon" type="image/png" href="images/ico.png" />
		<title>Consecutivo de cotizaciones</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
		<link href="stylenuevo.css" rel="stylesheet" type="text/css" />
	</head>

	<body onload="cargaPagina()">
		<script src="apareceMensajes.js"></script>
		<script>
      function cargaPagina() {
        document.getElementsByTagName('body')[0].style.opacity = "1";
      }

			function agregar_c()
			{
				location.href = "?sec=alta";
			}

			function eliminar_c()
			{
				location.href = "?sec=baja";
			}

			function modificar_c()
			{
				location.href = "?sec=cambio";
			}

			function visualizar_c()
			{
				location.href = "?sec=visualizarC";
			}

			function cotizaciones()
			{
				location.href = "?sec=cotizaciones";
			}

			function cotizar()
			{
				location.href = "?sec=cotizar";
			}

			function agregar_u()
			{
				location.href = "?sec=altaus";
			}

			function eliminar_u()
			{
				location.href = "?sec=bajaus";
			}

			function modificar_u()
			{
				location.href = "?sec=cambious";
			}

			function agregar_p()
			{
				location.href = "?sec=alta_p";
			}

			function eliminar_p()
			{
				location.href = "?sec=baja_p";
			}

			function modificar_p()
			{
				location.href = "?sec=cambio_p";
			}

			function ver_p()
			{
				location.href = "?sec=verP";
			}

			function log_in() {
				location.href = "?sec=log_in";
			}

			function cerrarSesion()
			{
				if (confirm("¿Realmente desea cerrar sesión?"))
				{
					document.location.href = 'cerrarsesion2.php';
				}

				else
				{
					document.location.href = 'index.php';
				}
			}
		</script>

		<div id="Contenido">
			<div id="encabezado_negro">
				<div class="acomodarMensaje centrar">
				<a href="http://www.bestlightmexico.com.mx" target="new" onmouseover="mensajeIcono1()" onmouseout="noMensajeIcono1()">
					<img src="images/logo_encabezado.png" id="logo_encabezado">
				</a>
				<div id="mensajeIcono1" class="mensajeIcono centrar">Ir a bestlightmexico.com.mx</div>
				</div>

				<div class="linea_vertical"></div>

				<div class="acomodarMensaje centrar">
				<a href="index.php">
					<img src="images/1home.png" class="iconoi_encabezado lineaHover
					<?php
														if(!isset($_GET['nombreBajaUs']))
														if(!isset($_GET['catalogo']))
														if(!isset($_GET['busquedaProductoDescripcion']))
														if(!isset($_GET['busquedaProductoCatalogo']))
														if(!isset($_GET['catalogoCambio']))
														if(!isset($_GET['nombreCambio']))
														if($_GET['sec'] == "")
															echo "lineaHoverSeleccionado";
					?>																" onmouseover="mensajeIcono2()" onmouseout="noMensajeIcono2()">
				</a>
				<div id="mensajeIcono2" class="mensajeIcono">Página principal</div>
				</div>

				<div id="iconos">
					<?php
						if(isset($_SESSION['usuarioc']))
						{
							echo
							'
								<div class="acomodarMensaje centrar">
									<img onclick="cotizar()" src="images/1generar.png" class="icono_encabezado lineaHover
							'; 															if($_GET['sec'] == "cotizar"){echo "lineaHoverSeleccionado";}

							echo '
									" onmouseover="mensajeIcono3()" onmouseout="noMensajeIcono3()">

									<div id="mensajeIcono3" class="mensajeIcono">
										Hacer cotización
									</div>
								</div>

								<div class="linea_verticalfd"></div>

								<div class="acomodarMensaje centrar">
								<img onclick="cotizaciones()" src="images/1cotizaciones.png" class="icono_encabezado lineaHover
							'; 		if($_GET['sec'] == "cotizaciones"){echo "lineaHoverSeleccionado";}

							echo '" onmouseover="mensajeIcono4()" onmouseout="noMensajeIcono4()" >
								<div id="mensajeIcono4" class="mensajeIcono">
										Revisar cotizaciones
								</div>
								</div>

								<div class="linea_verticalfd"></div>


								<div class="mover" onmouseover="mensajeIcono5()" onmouseout="noMensajeIcono5()">

								<div class="acomodarMensaje centrar">
									<img src="images/1clientes.png" class="icono_encabezado clientes lineaHover
							'; 			if($_GET['sec'] == "alta" OR $_GET['sec'] == "baja" OR $_GET['sec'] == "cambio" OR $_GET['sec'] == "visualizarC" OR isset($_GET['busquedaClienteCatalogo']) OR isset($_GET['busquedaClienteDescripcion'])){echo "lineaHoverSeleccionado";}

							echo '">
									<div id="mensajeIcono5" class="mensajeIcono">
											Clientes
									</div>
									</div>

									<div class="agregar">
											<div class="acomodarMensaje centrar">
											<img onclick="agregar_c()" src="images/2anadir.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "alta"){echo "sombraHoverSeleccionado";}

							echo '" ">
									</div>
											</div>

									<div class="eliminar">
											<div class="acomodarMensaje centrar">
											<img onclick="eliminar_c()" src="images/1eliminar.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "baja"){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>

									<div onclick="modificar_c()" class="modificar">
											<div class="acomodarMensaje centrar">
											<img src="images/1modificar.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "cambio"){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>

									<div class="visualizar">
											<div class="acomodarMensaje centrar">
											<img onclick="visualizar_c()" src="images/1ver.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "visualizarC" OR isset($_GET['busquedaClienteCatalogo']) OR isset($_GET['busquedaClienteDescripcion'])){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>

								</div>



								';
								if($permiso==1){
									echo '
									<div class="linea_verticalfd"></div>
								<div class="mover2" onmouseover="mensajeIcono6()" onmouseout="noMensajeIcono6()">

									<div class="acomodarMensaje centrar">
									<img src="images/1usuarios.png" class="icono_encabezado lineaHover
							'; 			if($_GET['sec'] == "altaus" OR $_GET['sec'] == "bajaus" OR $_GET['sec'] == "cambious"){echo "lineaHoverSeleccionado";}

							echo '">
									<div id="mensajeIcono6" class="mensajeIcono">
											Usuarios
									</div>
									</div>

									<div class="agregar">
											<div class="acomodarMensaje centrar">
											<img onclick="agregar_u()" src="images/2anadir.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "altaus"){echo "sombraHoverSeleccionado";}

							echo '" ">
									</div>
											</div>

									<div class="eliminar">
											<div class="acomodarMensaje centrar">
											<img onclick="eliminar_u()" src="images/1eliminar.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "bajaus"){echo "sombraHoverSeleccionado";}

							echo '" ">
									</div>
											</div>

									<div class="modificar">
											<div class="acomodarMensaje centrar">
											<img onclick="modificar_u()" src="images/1modificar.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "cambious"){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>
								</div>
				'; } echo '
								<div class="linea_verticalfd"></div>

								<div class="mover" onmouseover="mensajeIcono7()" onmouseout="noMensajeIcono7()">

									<div class="acomodarMensaje centrar">
									<img src="images/1productos.png" class="icono_encabezado lineaHover
							'; 			if($_GET['sec'] == "alta_p" OR $_GET['sec'] == "baja_p" OR $_GET['sec'] == "cambio_p" OR $_GET['sec'] == "verP" OR isset($_GET['busquedaProductoCatalogo']) OR isset($_GET['busquedaProductoDescripcion'])){echo "lineaHoverSeleccionado";}

							echo '" ">
									<div id="mensajeIcono7" class="mensajeIcono">
											Productos
									</div>
									</div>

									<div class="agregar">
											<div class="acomodarMensaje centrar">
											<img onclick="agregar_p()" src="images/2anadir.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "alta_p"){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>

									<div class="eliminar">
											<div class="acomodarMensaje centrar">
											<img onclick="eliminar_p()" src="images/1eliminar.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "baja_p"){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>

									<div class="modificar">
											<div class="acomodarMensaje centrar">
											<img onclick="modificar_p()" src="images/1modificar.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "cambio_p"){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>

									<div class="visualizar">
											<div class="acomodarMensaje centrar">
											<img onclick="ver_p()" src="images/1ver.png" class="icono_encabezado agregar sombraHover
							'; 					if($_GET['sec'] == "verP" OR isset($_GET['busquedaProductoCatalogo']) OR isset($_GET['busquedaProductoDescripcion'])){echo "sombraHoverSeleccionado";}

							echo '" ">
											</div>
									</div>


								</div>

								<div class="linea_verticalfd"></div>

								<div class="acomodarMensaje centrar">
								<img onclick="cerrarSesion()" src="images/1sesion.png" class="icono_encabezado lineaHover" onmouseover="mensajeIcono8()" onmouseout="noMensajeIcono8()">
								<div id="mensajeIcono8" class="mensajeIcono">
									Cerrar sesión
								</div>
								</div>
				</div>
							';
						}
				else
				{
					echo
					'
						<div class="linea_verticalfd"></div>

						<div class="acomodarMensaje centrar">
						<img onclick="log_in()" src="images/1sesion.png" class="icono_encabezado lineaHover" onmouseover="mensajeIcono9()" onmouseout="noMensajeIcono9()">
						<div id="mensajeIcono9" class="mensajeIcono">
							Iniciar sesión
						</div>
						</div>
			</div>
					';
				}
					?>
		</div>
    <div id="ocupaHeader"></div>

		<div id="contenidoCont">

			<?php
				if (!isset($_SESSION['usuarioc']))
				{
					require_once('log_in.php');
				}

				else
				{
					if ($seccion == null)
					{
						require_once("home.php");
					}

					if ($seccion == "log_in")
					{
						require_once("log_in.php");
						$atras="algo";
					}

					if ($seccion == "alta")
					{
						require_once("alta.php");
						$atras="algo";
					}

					if ($seccion == "baja")
					{
						require_once("baja_ad.php");
						$atras="algo";
					}

					if ($seccion == "cambio")
					{
						require_once("cambio_ad.php");
						$atras="algo";
					}

					if($seccion == "visualizarC")
					{
						require_once("cat_clientes.php");
						$atras="algo";
					}

					if ($seccion == "cotizaciones")
					{
						require_once("cotizaciones-admin.php");
						$atras="algo";
					}

					if ($seccion == "cotizar")
					{
						require_once("cotizar_ad.php");
						$atras="algo";
					}

					if ($seccion == "altaus")
					{
						require_once("altaus.php");
						$atras="algo";
					}

					if ($seccion == "bajaus")
					{
						require_once("bajaus.php");
						$atras="algo";
					}

					if ($seccion == "cambious")
					{
						require_once("cambious.php");
						$atras="algo";
					}

					if ($seccion == "alta_p")
					{
						require_once("alta_p.php");
						$atras="algo";
					}

					if (!isset($_GET['catalogo']))
					{
						$catalogo = NULL;

						if ($seccion == "baja_p")
						{
							require_once("baja_p.php");
							$atras="algo";
						}

					}

					else
					{
						if ($seccion == "baja_p")
						{
							$seccion="baja_p";
							require_once("baja_p.php");
							$atras="algo";
						}
					}

					if ($seccion == "cambio_p")
					{
						require_once("cambio_p.php");
						$atras="algo";
					}

					if ($seccion == "cambioproducto")
					{
						require_once("cambioproducto.php");
						$atras="algo";
					}

					if ($seccion == "cambiousuario")
					{
						require_once("cambiousuarion.php");
						$atras="algo";
					}

					if ($seccion == "creditos")
					{
						require_once("creditos.php");
						$atras="algo";
					}

					if ($seccion == "version")
					{
						require_once("version.php");
						$atras="algo";
					}

					if ($seccion == "verP")
					{
						require_once("cat_prod.php");
						$atras="algo";
					}

          if ($seccion == "empresaBuscar") {
            $empresaBuscar = $_GET['empresaBuscar'];
            require_once("cat_clientes.php?empresaBuscar=$empresaBuscar");
            $atras="algo";
          }
				}
			?>

		</div>
		<footer>

			<?php

				if($atras=="algo")
				{
					echo '
						<div class="acomodarMensaje centrar">
							<div id="mensajeFooter1" class="mensajeFooter centrar">Atras</div>
						</div>
						<div class="efectArrow">
							<a href="'?>javascript:history.go(-1)<?php echo'">
								<img src="images/arrowLeft.png" id="arrowLeft" onmouseover="mensajeFooter1()" onmouseout="noMensajeFooter1()">
							</a>
							</div>

						<div class="lineaVerticalPie"></div>

					';
				}

				echo
				"
					<div id='derechaFooter'>
				";
				if(isset($_GET['opcion'])){
				if($_GET['opcion'] == "todo")
				{
					echo
					"
						<div class='lineaVerticalPie'></div>
						<div id='sesionFooter2'>Mostrando todo el catálogo </div>
					";
				}
			}

				if(isset($_GET['busquedaProductoCatalogo']))
				{
					echo
					"
						<div class='lineaVerticalPie'></div>
						<div id='sesionFooter2'>Busqueda por catálogo: $busquedaProductoCatalogo </div>
					";
				}

				if(isset($_GET['busquedaProductoDescripcion']))
				{
					echo
					"
						<div class='lineaVerticalPie'></div>
						<div id='sesionFooter2'>Busqueda por descripción: $busquedaProductoDescripcion </div>
					";
				}

        if(isset($_POST['empresaBuscar'])) {
          $empresaBuscar = $_POST['empresaBuscar'];
					echo
					"
						<div class='lineaVerticalPie'></div>
						<div id='sesionFooter2'>Busqueda por empresa: $empresaBuscar </div>
					";
				}

        if(isset($_POST['rfc'])) {
          $rfc = $_POST['rfc'];
					echo
					"
						<div class='lineaVerticalPie'></div>
						<div id='sesionFooter2'>Busqueda por rfc: $rfc </div>
					";
				}

				echo
				"
					<div class='lineaVerticalPie'></div>
				";

				if(isset($id_usuario))
				{
					echo
					"
						<div id='sesionFooter'>"
							. $nombreCompleto .
						"</div>
					";
				}

				else
				{
					echo
					"
						<div id='sesionFooter'>
							Inicie sesión
						</div>
					";
				}

				echo
				"
						<div class='lineaVerticalPie'></div>
				";

				echo
				"
						<div id='versionFooter'>
							Version 1.0.0
						</div>
					</div>
				";
			?>
		</footer>
    </body>
</html>
