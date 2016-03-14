<!doctype html>
<html>

	<script>
		function imprimir() {

			var objeto = document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
			var ventana = window.open('', '_blank');  //abrimos una ventana vacía nueva
			ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
			ventana.document.close();  //cerramos el documento
			ventana.print();  //imprimimos la ventana
			ventana.close();  //cerramos la ventana
		}
	</script>
	
	<?php
		
		//------    CONVERTIR NUMEROS A LETRAS         ---------------
		//------    Máxima cifra soportada: 18 dígitos con 2 decimales
		//------    999,999,999,999,999,999.99
		// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE BILLONES
		// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE MILLONES
		// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE PESOS 99/100 M.N.
		//------    Creada por:                        ---------------
		//------             ULTIMINIO RAMOS GALÁN     ---------------
		//------            uramos@gmail.com           ---------------
		//------    10 de junio de 2009. México, D.F.  ---------------
		//------    PHP Version 4.3.1 o mayores (aunque podría funcionar en versiones anteriores, tendrías que probar)
		function numtoletras($xcifra)
		{
			$xarray = array(0 => "Cero",
				1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
				"DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
				"VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
				100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
			);
		//
			$xcifra = trim($xcifra);
			$xlength = strlen($xcifra);
			$xpos_punto = strpos($xcifra, ".");
			$xaux_int = $xcifra;
			$xdecimales = "00";
			if (!($xpos_punto === false)) {
				if ($xpos_punto == 0) {
					$xcifra = "0" . $xcifra;
					$xpos_punto = strpos($xcifra, ".");
				}
				$xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
				$xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
			}

			$XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
			$xcadena = "";
			for ($xz = 0; $xz < 3; $xz++) {
				$xaux = substr($XAUX, $xz * 6, 6);
				$xi = 0;
				$xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
				$xexit = true; // bandera para controlar el ciclo del While
				while ($xexit) {
					if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
						break; // termina el ciclo
					}

					$x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
					$xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
					for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
						switch ($xy) {
							case 1: // checa las centenas
								if (substr($xaux, 0, 3) < 100) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
									
								} else {
									$key = (int) substr($xaux, 0, 3);
									if (TRUE === array_key_exists($key, $xarray)){  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
										$xseek = $xarray[$key];
										$xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
										if (substr($xaux, 0, 3) == 100)
											$xcadena = " " . $xcadena . " CIEN " . $xsub;
										else
											$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
										$xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
									}
									else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
										$key = (int) substr($xaux, 0, 1) * 100;
										$xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
										$xcadena = " " . $xcadena . " " . $xseek;
									} // ENDIF ($xseek)
								} // ENDIF (substr($xaux, 0, 3) < 100)
								break;
							case 2: // checa las decenas (con la misma lógica que las centenas)
								if (substr($xaux, 1, 2) < 10) {
									
								} else {
									$key = (int) substr($xaux, 1, 2);
									if (TRUE === array_key_exists($key, $xarray)) {
										$xseek = $xarray[$key];
										$xsub = subfijo($xaux);
										if (substr($xaux, 1, 2) == 20)
											$xcadena = " " . $xcadena . " VEINTE " . $xsub;
										else
											$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
										$xy = 3;
									}
									else {
										$key = (int) substr($xaux, 1, 1) * 10;
										$xseek = $xarray[$key];
										if (20 == substr($xaux, 1, 1) * 10)
											$xcadena = " " . $xcadena . " " . $xseek;
										else
											$xcadena = " " . $xcadena . " " . $xseek . " Y ";
									} // ENDIF ($xseek)
								} // ENDIF (substr($xaux, 1, 2) < 10)
								break;
							case 3: // checa las unidades
								if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada
									
								} else {
									$key = (int) substr($xaux, 2, 1);
									$xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
									$xsub = subfijo($xaux);
									$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
								} // ENDIF (substr($xaux, 2, 1) < 1)
								break;
						} // END SWITCH
					} // END FOR
					$xi = $xi + 3;
				} // ENDDO

				if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
					$xcadena.= " DE";

				if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
					$xcadena.= " DE";

				// ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
				if (trim($xaux) != "") {
					switch ($xz) {
						case 0:
							if (trim(substr($XAUX, $xz * 6, 6)) == "1")
								$xcadena.= "UN BILLON ";
							else
								$xcadena.= " BILLONES ";
							break;
						case 1:
							if (trim(substr($XAUX, $xz * 6, 6)) == "1")
								$xcadena.= "UN MILLON ";
							else
								$xcadena.= " MILLONES ";
							break;
						case 2:
							if ($xcifra < 1) {
								$xcadena = "CERO PESOS $xdecimales/100 M.N.";
							}
							if ($xcifra >= 1 && $xcifra < 2) {
								$xcadena = "UN PESO $xdecimales/100 M.N. ";
							}
							if ($xcifra >= 2) {
								$xcadena.= " PESOS $xdecimales/100 M.N. "; //
							}
							break;
					} // endswitch ($xz)
				} // ENDIF (trim($xaux) != "")
				// ------------------      en este caso, para México se usa esta leyenda     ----------------
				$xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
				$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
				$xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
				$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
				$xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
				$xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
				$xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
			} // ENDFOR ($xz)
			return trim($xcadena);
		}

		// END FUNCTION

		function subfijo($xx)
		{ // esta función regresa un subfijo para la cifra
			$xx = trim($xx);
			$xstrlen = strlen($xx);
			if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
				$xsub = "";
			//
			if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
				$xsub = "MIL";
			//
			return $xsub;
		}

		// END FUNCTION

		
		
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header('Location: log_in.php');
        }
        $id_usuario = $_SESSION['usuario'];

//incluimos el archivo con las funciones
        include ("funciones_mysql.php");

//Funcion que conecta la base de datos
        $conexion = conectar();

        $id_cotizacion = $_GET['id_cotizacion'];

        $sql = "SELECT* FROM Cotizaciones WHERE id_cotizacion = '$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $fecha = $campo['fecha'];
        $id_num_cliente = $campo['id_num_cliente'];
        $id_usuario = $campo['id_usuario'];
        $vigencia = $campo['vigencia'];
        $no_partidas = $campo['no_partidas'];
        $divisa = $campo['divisa'];
        $subtotal = $campo['subtotal'];
        $iva = $campo['iva'];
        $total = $campo['total'];
        $t_entrega = $campo['t_entrega'];
        $c_pago = $campo['c_pago'];
        $descuento = $campo['descuento'];
        $descuento2 = $descuento * 100;
        $sub = $subtotal;
        $subtotal1 = $subtotal * $descuento;
        $subtotal2 = $subtotal - $subtotal1;

        $sql = "SELECT `id_direccion` FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $id_direccion = $campo['id_direccion'];

        $sql = "SELECT * FROM Datos_Cotizacion WHERE `id_cotizacion`='$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $cliente = $campo['datos_cliente'];
        $contacto = $campo['datos_contacto'];
        $vendedor = $campo['datos_vendedor'];



        $sql = "SELECT id_contacto, empresa FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $id_contacto = $campo['id_contacto'];
        $empresa = $campo['empresa'];



        $sql = "SELECT nombre_c, departamento, telefono1, telefono2, e_mail_c FROM Contacto WHERE id_contacto='$id_contacto'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre_c = $campo['nombre_c'];
        $departamento = $campo['departamento'];
        $telefono1 = $campo['telefono1'];
        $telefono2 = $campo['telefono2'];
        $e_mail_c = $campo['e_mail_c'];


        $sql = "SELECT nombre, apellido_p, apellido_m, e_mail FROM Usuarios WHERE id_usuario='$id_usuario'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre = $campo['nombre'];
        $apellido_p = $campo['apellido_p'];
        $apellido_m = $campo['apellido_m'];
        $e_mail = $campo['e_mail'];


        $nombre = "$nombre " . "$apellido_p " . "$apellido_m";


        $sql = "SELECT `calle`,`num_int`,`num_ext`,`municipio`,`estado`,`cp` FROM Direcciones WHERE id_direccion=$id_direccion";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $calle = $campo['calle'];
        $num_int = $campo['num_int'];
        $num_ext = $campo['num_ext'];
        $municipio = $campo['municipio'];
        $estado = $campo['estado'];
        $cp = $campo['cp'];

//INICIA LA PAGINA WEB
	?>

<head>
    <title>Orden de venta</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
<div id="imprimeme">
	
	<style type="text/css">	

		* 
		{
			margin: 0;
			padding: 0;
		}
		


		body 
		{
			padding-bottom: 20px;
			font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
			color: #262626;
			background: #F4F2F3;
		}
		
		#contenido
		{		
			padding: 20px 50px 40px 50px;
			margin: 0 auto;
			margin-top: 50px;
			width: 950px;
			height: 100%;
			background: #FFFFF7;
		}
		
		#logo
		{			
			float: left;
			margin: 50px 0 0 20px;
		}
		
		#nombre_empresa
		{
			float: right;
			color: #0E0E0C;
			margin: 20px 240px 0 0;
			font-weight: normal;
			font-size: 1.5em;
		}
		
		#encabezado
		{		
				position: relative;
				height: 160px;
		}
		
		#datos_cliente
		{
			background: #F4F2F3;
			float: left;
			width: 75%;
			height: 60%;
			border: solid #262626;
			border-width: 0.1em;
			border-radius: 10px 0 0 0;
			box-sizing: border-box;			
			padding: 10px;
		}	
		
		#datos_clientei
		{
			float: left;
		}
			
		.datos_clienteii
		{
			float: left;
			padding-right: 10px;
			font-size: 1.1em;
		}
		
		.datos_clientedd
		{
			float: right;
		}		
		
		#datos_cliented
		{
			float: right;
			padding-top: 50px;
		}
		
		.datos
		{
			font-size: 0.7em;
		}
		
		#lugar_entrega
		{
			background: #F4F2F3;
			float: left;
			border: solid #262626;
			border-width: 0.1em;
			border-top: none;
			border-radius: 0 0 0 10px;
			width: 75%;
			height: 40%;
			box-sizing: border-box;			
			padding: 10px;
		}
		
		#orden_venta
		{
			background: #F4F2F3;
			float: right;
			border: solid #262626;
			border-width: 0.1em;
			border-left: none;
			border-radius: 0 10px 0 0;
			width: 25%;
			height: 25%;
			text-align: center;
			box-sizing: border-box;			
			padding: 10px;
		}
		
		#fecha
		{
			background: #F4F2F3;
			width: 25%;
			height: 25%;
			float: right;
			border: solid #262626;
			border-width: 0.1em;
			border-left: none;
			border-top: none;
			box-sizing: border-box;			
			padding: 10px;
		}
		
		#fechai
		{
			float:left;
			
		}
		
		#fechad
		{
			float:right;
		}
		
		#c_pago
		{
			background: #F4F2F3;
			text-align: center;
			float: right;
			width: 25%;
			height: 25%;
			border: solid #262626;
			border-width: 0.1em;
			border-left: none;
			border-top: none;
			box-sizing: border-box;			
			padding: 10px;
		}
		
		#rep_ventas
		{
			background: #F4F2F3;
			float: right;
			width: 25%;
			height: 25%;
			border: solid #262626;
			border-width: 0.1em;
			border-radius: 0 0 10px 0;
			border-left: none;
			border-top: none;
			box-sizing: border-box;			
			padding: 10px;
		}
		
		.rep_ventasi
		{
			float: left;
			margin-left: 30px;
		}		
		
		.rep_ventasd
		{
			float: right;
			margin-right: 30px;
		}
		
		#rep_ventas h6
		{
			text-align: center;
			margin-bottom: 6px;
		}
		
		#tabla table tr th
		{
			background: #093C3F;
			border-width: 2px;
			color: white;
			padding: 3px;
		}			
		
		#tabla table tr td
		{
			background: #F4F2F3;
			border: solid #0E0E0C;
			border-width: 1px;
		}		
		
		#tabla table
		{
			border-spacing: 0; 
		}
		
		#uno
		{
			width: 60px;
			border-right: solid #5A79A5;
			border-radius: 10px 0 0 0 ;
		}		
		
		#dos
		{
			width: 60px;
			border-right: solid #5A79A5;
		}		
		
		#tres
		{
			width: 60px;
			border-right: solid #5A79A5;
		}		
		
		#cuatro
		{
			width: 600px;
			border-right: solid #5A79A5;
		}		
		
		#cinco
		{
			width: 60px;
			border-right: solid #5A79A5;			
		}		
		
		#seis
		{
			width: 60px;
			border-radius: 0 10px 0 0 ;
		}
		
		.centrar
		{
			text-align: center;
		}	
		
		.al_der
		{
			text-align: right;
			padding-right: 2px;
		}

		.add_padding
		{
			padding: 10px;
		}
		
		#notas
		{
			background: #F4F2F3;
			float: left;
			border: solid #262626;
			border-width: 1px;
			border-radius: 5px 0 0 0;
			box-sizing: border-box;	
			padding: 8px;
			width: 75%;
			height: 40%;
		}
		
		#totales
		{
			background: #F4F2F3;
			border: solid #262626;
			border-width: 1px;
			border-left: none;
			border-radius: 0 5px 5px 0;
			float: right;
			box-sizing: border-box;	
			padding: 8px;
			width: 25%;
			height: 100%;
		}	
			
		#totales hr
		{
			width: 100%;
			margin-right: -8px;
		}
		
		#totalesi
		{
			float: left;
		}		
		
		#totalesd
		{
			float: right;
			text-align: right;
		}
		
		#imp_letra
		{
			background: #F4F2F3;
			float: left;
			border: solid #262626;
			border-width: 1px;
			border-radius: 0 0 0 5px;
			border-top: none;
			box-sizing: border-box;	
			padding: 8px;
			width: 75%;
			height: 60%;
		}
		
		#importe
		{
			background: #093C3F;
			width: 14%;
			color: #FFFFFF;
			padding: 2px;
			margin-bottom: 10px;
			
		}
		
		
		#ger_ven
		{
			background: #F4F2F3;
			float: left;
			width: 150px;
			margin: 10px 40px 10px 110px;
			border: solid #262626;
			border-width: 1px;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
		}
		
		#ger_op
		{
			background: #F4F2F3;
			float: left;
			width: 150px;
			margin: 10px 40px 10px 0;
			border: solid #262626;
			border-width: 1px;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
		}		
		
		#asis_ven
		{
			background: #F4F2F3;
			float: left;
			width: 150px;
			margin: 10px 40px 10px 0;
			border: solid #262626;
			border-width: 1px;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
		}		
		
		#cre_cob
		{
			background: #F4F2F3;
			float: left;
			width: 150px;
			margin: 10px 40px 10px 0;
			border: solid #262626;
			border-width: 1px;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
		}
		
		.caja_total
		{
			text-align: right;
			width: 100px; 
			height: 20px;
			padding: 0 5px 0 5px;
			border: none;
		}		

		input[type=submit] {
			float: right;
			background: url("images/arrow.png") no-repeat;
			border: 0;
			display: block;
			margin: 1px 0 0 0;
			height: _the_image_height;
			width: 15px;
		}
		
		#datos_grales
		{
			width: 100%;
			height: 220px;
		}
		
		#datos_bottom
		{
			width: 100%;
			height: 150px;
		}
		
		.break
		{
			background: #F4F2F3;
			clear: both;
		}
		


    </style>
	
</head>

<body onLoad="document.forma1.cantidad.focus();">

	<div id="contenido">

		<div id="encabezado">
		
			<div id="logo">
			
				<img src="images/alsa_principal.png" alt="Logo de la empresa">
			
			</div>
			
			<div id="nombre_empresa">
			
				ARTEFACTOS LUMÍNICOS S.A. DE C.V.
			
			</div>
			
		</div>	
		
		<div id="datos_grales">
		
			<div id="datos_cliente">
			
				<div id="datos_clientei">
					
					<div class="datos_clienteii">
					
						<h6>Cliente: </h6>
						<h6>Dirección: </h6>
						<h6>Colonia: </h6>
						<h6>Del/Mun: </h6>
						<h6>Teléfono: </h6>
						<h6>At'n: </h6>
			

				
					</div>
					
					<div class="datos_clientedd">
					
						<div class="datos">
							NGA1 NYG ARCHITECTURE, S.A. DE C.V.<br />
							GRANDEZA MEXICANA 20<br />
							UNIDAD HABITACIONAL INDEPENDENCIA<br />
							MAGDALENA CONTRERAS MÉXICO D.F.<br />
							1102-1500 ext.161D<br />
							JAIME FERNANDO ROSAS MARTINEZ<br />
						</div>
					
					</div>
				
				</div>
				
				<div id="datos_cliented">
				
					<div class="datos_clienteii">
					
						<h6>C.P.: </h6>
						<h6>Pedido cliente: </h6>
						<h6>R.F.C.: </h6>
						
					</div>
					
					<div class="datos_clientedd">
					
						<div class="datos">
							10100<br />
							N/A<br />
							NGA110808TH0
						</div>
					
					</div>
				
				</div>			
				
			</div>
			
			<div id="orden_venta">
					
					<h6>Orden de venta No.</h6>
					<span class="datos">5399</span>
					
			</div>
			
			<div id="fecha">
			
				<div id="fechai">
				
					<h6>Fecha: </h6>
					<h6>Entrega: </h6>
				
				</div>
				
				<div id="fechad" class="datos">
				
					
					09/03/2015<br />
					5-7 SMS 27/04/2015
				
				</div>
			
			</div>
			
			<div id="c_pago">
			
				<h6>Condiciones de pago</h6>
				<span class="datos">50% Ant saldo vs entrega</span>
				
			</div>
			

			
			
			
			<div id="lugar_entrega">
			
				<h6>Lugar de entrega:</h6>
				<span class="datos">MISMO</span>
			
			</div>
			
			<div id="rep_ventas">
			
				<h6>Representante de ventas No.</h6>
				<div class="datos">
				
					<div class="rep_ventasi">
					
						28
					
					</div>
					
					<div class="rep_ventasd">
					
						Aaron Masetto
					
					</div>
				
				</div>
			
			</div>
		
		</div>

		
		
		
								<div class="break"></div>
								
								
		<br />
		<div id="tabla">
		
			<table>
			
				<tr>
				
					<th id="uno">PDA.</th>
					<th id="dos">CANT.</th>
					<th id="tres">UNID.</th>
					<th id="cuatro">CATALOGO Y DESCRIPCION</th>
					<th id="cinco">P.U.</th>
					<th id="seis">P.T.</th>
				
				</tr>
				
				<tr class="datos">
				
					<td class="centrar">1</td>
					<td class="centrar">9</td>
					<td class="centrar">pza</td>
					<td class="add_padding">LUMINARIO MOD. PGRL TIPO ALUMBRADO COMERCIAL, CUERPO FABRICADO EN<br/>
						FUND. DE AMU. COLOR NEGRO, CUENTA C/VARILLAS P/SUJETAR EL CRISTAL P/<br/>
						MÁXIMA SEGURIDAD, OPTICA REFLECTOR DE CRISTAL DE BORISILICATO PRISMATICO
						MCA HOLOPHANE. INCLUYE LAMP. ECO GLOBO MCA. PH</td>
					<td class="al_der bord">6,102.00</td>
					<td class="al_der">54.918.00</td>
				
				</tr>
			
			</table>
			
		</div>
		
		<br />
		<br />
		
		<hr />
			
								<div class="break"></div>
		
		<br />
		<br />
		
		<div id="datos_bottom">		
		
			<div id="notas">
				<h5>Notas:</h5> 
				<span class="datos">Se esntregara enhuacalado y embalzamado para su mayor protección del producto</span>
			</div>
			
			<div id="totales">
			
				<div id="totalesi">
				
					<h5>SUBTOTAL:</h5>
					
					<br />
					
					<h5>16% I.V.A.:</h5>
					
					<br />
					
					<br />
					
					<h5>TOTAL:</h5>
				 
				</div>			
				
				<div id="totalesd">
				
					<h5>54,918.00</h5>
					
					<br />
					
					<h5>8,786.88</h5>
					
					<br /> <hr style="float: right;"/>
					
					<br />
					
					<form name="forma1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" name="cantidad" value="<?php echo isset($_POST['cantidad']) ? $_POST['cantidad'] : ''; ?>" maxlength="21" class="caja_total" />  
				
				<br /><input type="submit" name="boton1" value="">
					
				</div>
		
			</div>
			
					<div id="imp_letra">
		
			<div id="importe"><h6>Importe con letra:</h6></div>
			<?php echo isset($_POST['cantidad']) ? numtoletras($_POST['cantidad']) : ''; ?>
			</form>
			
		
		</div>
		
		</div>


		


						<div class="break"></div>

		<div id="ger_ven">
			<h5>Gerencia de ventas</h5>
			<hr/>
			<br/>
			<span class="datos"><br/></span>
		</div>						

		<div id="ger_op">
			<h5>Gerencia Operativa</h5>
			<hr/>
			<br/>
			<span class="datos"><br/></span>
		</div>
		
		<div id="asis_ven">
			<h5>Asistente de ventas</h5>
			<hr/>
			<br/>
			<span class="datos"><br/></span>
		</div>
		
		<div id="cre_cob">
			<h5>Crédito y Cobranza</h5>
			<hr/>
			<br/>
			<span class="datos"><br/></span>
		</div>
		
						<div class="break"></div>
		

	</div>
	
</div>

	<button onclick="imprimir();" class="formu-button6">Imprimir</button>
	

</body>



</html>