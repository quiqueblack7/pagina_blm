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
			
			<form method="POST" action="partidas3.php">
		
			<div class="izquierda padding">
			
				<img src="images/logo.png" alt="Logo de la empresa"/>	
				
			</div>	
			
			<div id="cliente" class="izquierda">
				
				<div class="titulo center">CLIENTE / QUOTE TO</div>
				<div class="terminos">
					<hr/>
				
					<div class="izquierda paddingleft">
					
						Razón Social:
						<?php echo $empresa;?>						
						<br/>
						<br/>
						Dirección y datos fiscales:
						<?php echo "$calle " . "$num_int," . " $num_ext, " . "$colonia, " . "C.P. $cp" 
						. ",$municipio " . "$estado"; ?>
					
					
					</div>
					
					<div class="break"></div>
					
					
					<div class="izquierda paddingleft cliente_bot_left">
						<br/>
						At'n: <?php echo $nombre_c; ?>
						<br/>
						E-mail: <?php echo $e_mail_c; ?>
					</div>	
					
					<div class="izquierda bigpaddingleft cliente_bot_right">
						<br />
						Tels: <br /><?php echo "$telefono1 " . "<br />" . "$telefono2"; ?>
					</div>				
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
			
				<div class="titulo center">No. <span class="red-font bold-font">BLM1900</span></div>  
				
					<hr/>
					<div class="parrafo center">
					
						FECHA / DATE
						<hr/>
						<?php echo $fecha;?>
						<br/>
						<hr/>
						PROYECTO / PROJECT
						<hr/>
						<textarea id="project-area" autofocus></textarea>
						<hr/>
						CONDICIONES DE PAGO / TERMS
						<hr/>
						<textarea id="project-area" autofocus></textarea>
					
					</div>
								
			</div>
			
											<div class="break"></div>
										

			<br />
			<div id="tamaniotabla">
			
			<table class="table">
			
				<tr>
				
					<td class="bd parrafo" id="uno">P / IT</td>
					<td class="bd parrafo" id="dos">PROD / PROD</td>
					<td class="bd parrafo" id="tres">DESCRIPCIÓN / DESCRIPTION</td>
					<td class="bd parrafo" id="cuatro">C / Q</td>
					<td class="bd parrafo" id="cinco">DESC/ DISC</td>
					<td class="bd parrafo" id="seis">P UNIT / UNIT P</td>
					<td>IMP. / AMO.</td>
				
				</tr>
				
				<tr>
				
<?php
                            $subtotal = 0;
                            $nom_partida = 0;
//Obtener "tabla Partidas"
                            $sql = "SELECT `partida`,`cantidad`,`unidad`,`catalogo`,`descripcion`,`precio_uni`,`precio_total` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
                            $resultado = query($sql, $conexion);
                            while ($campo = mysql_fetch_array($resultado)) {
                                $precio_uni = $campo['precio_uni'];
                                $precio_total = $campo['precio_total'];
                                $precio_uni = number_format($precio_uni, 2);
                                $precio_total = number_format($precio_total, 2);

                                echo
                                "<tr>" .
                                "<td>" . $campo['partida'] . "</td>";

                                echo
								"<td>" . $campo['catalogo'] . "</td>" .
								"<td>" . $campo['descripcion'] . "</td>";
								
								if ($campo['cantidad'] == 0) {
                                    echo
                                    "<td> </td>";
                                } else {
                                    echo
                                    "<td>" . $campo['cantidad'] . "</td>";
                                }
								
								echo
                                "<td>" . $campo['unidad'] . "</td>"
                                ;

                                if ($campo['precio_uni'] == 0) {
                                    echo
                                    "<td> </td>" .
                                    "<td> </td>";
                                } else {
                                    echo
                                    "<td>" . $precio_uni . "</td>" .
                                    "<td>" . $precio_total . "</td>";
                                }
                                "</tr>";
                                $subtotal = $subtotal + $campo['precio_total'];
                                $nom_partida = $nom_partida + 1;
                            }

                            $subtotal1 = $subtotal * $descuento;
                            $subtotal2 = $subtotal - $subtotal1;
                            $iva = $subtotal2 * 0.16;
                            $total = $subtotal2 + $iva;

                            $_SESSION['subtotal'] = $subtotal2;
                            $_SESSION['total'] = $total;
                            $_SESSION['iva'] = $iva;


                            $iva = number_format($iva, 2);
                            $total = number_format($total, 2);
                            $subtotal = number_format($subtotal, 2);
                            $subtotal2 = number_format($subtotal2, 2);
                            ?>
				
				</tr>			
				
			</table>
			
			</div>
			
			<br />
			
		<div id="pie">
		
			<div id="clausulas">
			
				<div class="titulo center bold">OBSERVACIONES:</div>
				<hr />
				<table class="terminos tabla">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>DESCRIPCIÓN</th>
                                            </tr>
                                        </thead>

<?php
//Obtener Datos de la empresa a cotizar "tabla Partidas"
$sql = "SELECT `no_nota`,`descripcion` FROM `Notas` WHERE `id_cotizacion` = '$id_cotizacion'";
$resultado = query($sql, $conexion);
$i = 1;
while ($campo = mysql_fetch_array($resultado)) {
    echo
    "<tr>" .
    "<td>" . $i . "</td>" .
    "<td>" . $campo['descripcion'] . "</td>" .
    "</tr>";
    $i++;
}
?>


                                    </table>
			
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
					<?php echo "$nombre"; ?>
					<br/>
					<br/>
					E-mail: <?php echo "$e_mail "; ?>			
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
		<?php if ($cancelar == 0) { ?>
                    <input type="submit" value="Crear" id="imprimir">
<?php } else { ?>

                    <input type="submit" value="Aceptar" id="imprimir">

                <?php } ?>
		</div>
		</form>
		<!--"<div class="center">
		<button onclick="imprimir();" id="imprimir">Imprimir</button>
		</div>-->
	</body>

</html>