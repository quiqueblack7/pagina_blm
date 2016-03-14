<!doctype html>
<html>

            <?php
//Capturamos el usuario autenticado
            session_start();
            if (!isset($_SESSION['usuario'])) {
                header('Location: log_in.php');
            }
            if (!isset($_SESSION['cotizacion'])) {
                header('Location: ventas.php?sec=cotizar');
            }
            $id_usuario = $_SESSION['usuario'];
            $empresa = $_SESSION['empresa'];
            $id_cotizacion = $_SESSION['cotizacion'];

//incluimos el archivo con las funciones
            include ("funciones_mysql.php");

//Funcion que conecta la base de datos
            $conexion = conectar();

            $fecha = date('d-m-y');

            if (isset($_SESSION['cancelar'])) {
                $cancelar = $_SESSION['cancelar'];
            } else {
                $cancelar = 0;
            }

            $sql = "SELECT `id_partida` FROM Partidas ORDER BY `id_partida` DESC LIMIT 1";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_row($resultado)) {
                $id_partida = $campo[0] + 1;
            }

            $sql = "SELECT `id_direccion` FROM `Clientes` WHERE `empresa`='$empresa'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $id_direccion = $campo['id_direccion'];
            }

            $sql = "SELECT `id_contacto` FROM `Clientes` WHERE `empresa`='$empresa'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $id_contacto = $campo['id_contacto'];
            }

            $sql = "SELECT nombre_c, departamento, telefono1, telefono2, e_mail_c FROM Contacto WHERE id_contacto='$id_contacto'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre_c = $campo['nombre_c'];
                $departamento = $campo['departamento'];
                $telefono1 = $campo['telefono1'];
                $telefono2 = $campo['telefono2'];
                $e_mail_c = $campo['e_mail_c'];
            }

            $sql = "SELECT nombre, apellido_p, apellido_m, e_mail FROM Usuarios WHERE id_usuario='$id_usuario'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre = $campo['nombre'];
                $apellido_p = $campo['apellido_p'];
                $apellido_m = $campo['apellido_m'];
                $e_mail = $campo['e_mail'];
            }

            $nombre = "$nombre " . "$apellido_p " . "$apellido_m";


            $sql = "SELECT * FROM Direcciones WHERE id_direccion=$id_direccion";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $calle = $campo['calle'];
                $num_int = $campo['num_int'];
                $num_ext = $campo['num_ext'];
                $municipio = $campo['municipio'];
                $estado = $campo['estado'];
                $cp = $campo['cp'];
                $colonia = $campo['colonia'];
            }



            $sql = "SELECT `id_contacto` FROM Clientes WHERE empresa='$empresa'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $id_contacto = $campo['id_contacto'];
            }

            $sql = "SELECT `nombre_c`,`departamento`,`telefono1`,`telefono2`,`e_mail_c` FROM Contacto WHERE id_contacto=$id_contacto";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre_c = $campo['nombre_c'];
                $departamento = $campo['departamento'];
                $telefono1 = $campo['telefono1'];
                $telefono2 = $campo['telefono2'];
                $e_mail_c = $campo['e_mail_c'];
            }

            $sql = "SELECT `nombre`,`apellido_p`,`apellido_m`,`e_mail` FROM Usuarios WHERE id_usuario='$id_usuario'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre = $campo['nombre'];
                $apellido_p = $campo['apellido_p'];
                $apellido_m = $campo['apellido_m'];
                $e_mail = $campo['e_mail'];
            }

            /* $sql="SELECT `descripcion` FROM Notas WHERE id_nota='$id_nota'";
              $resultado = query($sql,$conexion);
              while ($campo = mysql_fetch_array($resultado)){
              $descripcion=$campo['descripcion'];
              } */


            $no_partidas = 0;
            $sql = "SELECT `partida` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $no_partidas = $no_partidas + 1;
            }

            $_SESSION['no_partidas'] = $no_partidas;


            $sql = "SELECT * FROM Cotizaciones WHERE `id_cotizacion` = '$id_cotizacion'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $descuento = $campo['descuento'];
            }
            $descuento2 = $descuento * 100;


/////////////////COMIENZA LA PAGINA WEB//////////////+
            ?>

	<div id="imprimeme">
	<head>
		<title>Formato de cotización.</title>

		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="estilo.css" rel="stylesheet" type="text/css" />
		
		<script>
			function imprimir() 
			{

				var objeto = document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
				var ventana = window.open('', '_blank');  //abrimos una ventana vacía nueva
				ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
				ventana.document.close();  //cerramos el documento
				ventana.print();  //imprimimos la ventana
				ventana.close();  //cerramos la ventana
			}
		</script>
		
	
		
	</head>

	<body>		
		
			<div id="pagina">
		
			<div class="izquierda padding">
			
				<img src="images/logo.png" alt="Logo de la empresa"/>	
				
			</div>	
			
			<div id="cliente" class="izquierda">
			
				<div class="titulo center">CLIENTE / QUOTE TO</div>
				
					<hr/>
				
					<div class="izquierda parrafo paddingleft">
					
						<br/>
						Razón Social: <?php echo $empresa;?>
						<br/>
						<br/>
						Dirección y datos fiscales:
						<br/>
						<br/>
						<br/>
						<br/>
						At'n:
						<br/>
						E-mail
					
					</div>
					
					<div class="izquierda parrafo bigpaddingleft">
					
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						Tels:	
					</div>				

								
			</div>			
			
			<div id="cotizacion" class="izquierda">
			
				<div class="titulo black center bold">COTIZACION / QUOTE</div>
				
					<hr/>
					<div class="parrafo center">					

						TÉRMINOS Y CONDICIONES / TERMS
						<hr/>				
					</div>
					
					<div class="parrafo justify padrl terminos">
					
						*Precios sujetos a cambio sin previo aviso.
						<br />
						*Toda devolución autorizada causará un cargo del 35%.
						<br />
						*No se aceptan cancelaciones.
						<br />
						*La empresa se reserva el derecho de hacer cargos por almacenaje 72 hrs. posteriores al aviso de mercancia preparada.
						<br />
						*Si se confirma el pedido considerar el tipo de cambio del diario oficial de la federacion del dia que se realice la orden.
					</div>
								
			</div>			
			
			<div id="no" class="izquierda">
			
				<div class="titulo paddingleft">No.</div>
				
					<hr/>
					<div class="parrafo center">
					
						FECHA / DATE
						<hr/>
						<br/>
						<br/>
						<hr/>
						PROYECTO / PROJECT
						<hr/>
						<br/>
						<br/>
						<hr/>
						CONDICIONES DE PAGO / TERMS
						<hr/>
					
					</div>
								
			</div>
			
											<div class="break"></div>
										

			<br />
			<div id="tamaniotabla">
			
			<table class="table">
			
				<tr>
				
					<td class="bd" id="uno">PART.<hr/>ITEM</td>
					<td class="bd" id="dos">DESCRIPCIÓN<hr/>DESCRIPTION</td>
					<td class="bd" id="tres">CANTIDAD<hr/>QUANTITY</td>
					<td class="bd" id="cuatro">PRECIO DE LISTA<hr/>LIST PRICE</td>
					<td class="bd" id="cinco">DESCUENTO<hr/>DSCT.</td>
					<td class="bd" id="seis">PRECIO UNITARIO<hr/>UNIT PRICE</td>
					<td>IMPORTE<hr/>AMOUNT</td>
				
				</tr>
				
				<tr>
				
					<td>1</td>
					<td>DESCRIPCIÓN</td>
					<td>CANTIDAD</td>
					<td class="right_a">PRECIO DE LISTA</td>
					<td class="right_a">DESCUENTO</td>
					<td class="right_a">PRECIO UNITARIO</td>
					<td>IMPORTE</td>
				
				</tr>			
				
			</table>
			
			</div>
			
			<br />
			
		<div id="pie">
		
			<div id="clausulas">
			
				<div class="titulo center bold">OBSERVACIONES:</div>
				<hr />
			
			</div>
			
			<div id="firmas">		
				<div class="titulo2 center bold">GERENCIA VENTAS/SALES MANAGEMENT</div>
				<hr />
				<br />
				<br />
				<br />
				<hr />
				<div class="parrafo center">FIRMA / SIGNATURE</div>
				<hr/>
							
				<div class="titulo2 center bold">VENDEDOR / SELLER</div>
				<hr />
					<div class="parrafo izquierda paddingleft">					
					Nombre:
					<br/>
					<br/>
					E-mail:					
					</div>					
					<div class="derecha parrafo normalpaddingright">					
						Tel:	
					</div>
			
			</div>
			
			<div id="dinero">
			
				<div id="conceptos">
				
					<div class="parrafo2 center">DCTO. P.P.P.</div>
					<hr/>
					<div class="parrafo2 center">DISCOUNT</div>
					<hr/>
					<div class="parrafo2 center">SUBTOTAL</div>
					<hr/>
					<div class="parrafo2 center">SUBTOTAL</div>
					<hr/>
					<div class="parrafo2 center">I.V.A. 16%</div>
					<hr/>
					<div class="parrafo2 center">TAXES</div>
					<hr/>
					<div class="titulo2 center bold">TOTAL A PAGAR</div>
					<hr/>
					<div class="titulo2 center bold">PAY THIS AMOUNT</div>
				
				</div>
				
				<div id="cantidades">
				
					<br />
					<hr />
					<br />
					<hr />
					<br />
					<hr />
					<br />
					
				</div>
			
			</div>			
		
			</div>
			
			<br />
			
			<div class="parrafo2 center">
				Avenida Benito Juárez 9 Loc. 1 Ef. 2 San Mateo Ixtacalco, Cuautitlán Izcalli, 
				Estado de México, C.P. 54713 Tel. (55) 58701510 y (55) 26202313
			</div>
			
			</div>
		</div>
		<div class="center">
		<button onclick="imprimir();" id="imprimir">Imprimir</button>
		</div>
	</body>

</html>