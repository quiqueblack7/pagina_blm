<!DOCTYPE html >
<?php
//Capturamos el usuario autenticado
session_start();
if (!isset($_SESSION['usuario'])) { header('Location: log_in.php'); }
if (!isset($_SESSION['cotizacion'])) { header('Location: ventas.php?sec=cotizar'); }
$id_usuario=$_SESSION['usuario'];
$empresa=$_SESSION['empresa'];
$id_cotizacion=$_SESSION['cotizacion'];

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$fecha=date('d-m-y');



$sql="SELECT `id_partida` FROM Partidas ORDER BY `id_partida` DESC LIMIT 1";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_row($resultado)){
$id_partida=$campo[0]+1;
}

$sql="SELECT `id_direccion` FROM `Clientes` WHERE `empresa`='$empresa'";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$id_direccion=$campo['id_direccion'];
}

$sql="SELECT `id_contacto` FROM `Clientes` WHERE `empresa`='$empresa'";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$id_contacto=$campo['id_contacto'];
}

$sql="SELECT nombre_c, departamento, telefono1, telefono2, e_mail_c FROM Contacto WHERE id_contacto='$id_contacto'";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$nombre_c= $campo['nombre_c'];
$departamento= $campo['departamento'];
$telefono1= $campo['telefono1'];
$telefono2= $campo['telefono2'];
$e_mail_c= $campo['e_mail_c'];
}

$sql="SELECT nombre, apellido_p, apellido_m, e_mail FROM Usuarios WHERE id_usuario='$id_usuario'";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$nombre= $campo['nombre'];
$apellido_p= $campo['apellido_p'];
$apellido_m= $campo['apellido_m'];
$e_mail= $campo['e_mail'];
}

$nombre="$nombre "."$apellido_p "."$apellido_m";


$sql="SELECT `calle`,`num_int`,`num_ext`,`municipio`,`estado`,`cp` FROM Direcciones WHERE id_direccion=$id_direccion";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$calle=$campo['calle'];
$num_int=$campo['num_int'];
$num_ext=$campo['num_ext'];
$municipio=$campo['municipio'];
$estado=$campo['estado'];
$cp=$campo['cp'];
}



$sql="SELECT `id_contacto` FROM Clientes WHERE empresa=$empresa";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$id_contacto=$campo['id_contacto'];
}

$sql="SELECT `nombre_c`,`departamento`,`telefono1`,`telefono2`,`e_mail_c` FROM Contacto WHERE id_contacto=$id_contacto";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$nombre_c=$campo['nombre_c'];
$departamento=$campo['departamento'];
$telefono1=$campo['telefono1'];
$telefono2=$campo['telefono2'];
$e_mail_c=$campo['e_mail_c'];
}

$sql="SELECT `nombre`,`apellido_p`,`apellido_m`,`e_mail` FROM Usuarios WHERE id_usuario=$id_usuario";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$nombre=$campo['nombre'];
$apellido_p=$campo['apellido_p'];
$apellido_m=$campo['apellido_m'];
$e_mail=$campo['e_mail'];
}

$sql="SELECT `descripcion` FROM Notas WHERE id_nota=$id_nota";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
$descripcion=$campo['descripcion'];
}

?>
<head>
    <title>Formulario de Cotización</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body> <br><br><br>
  
    <div id="page">
             <h2 align="center">Artefactos Lumínicos S.A. de C.V.</h2>
             <br>
   <div align="center">


    <table border=0 cellspacing="2px" width="90%">
	<tr >

              <td height="33.3%" width="33.3%" id="bordet">
 	      <div align="center"> <img align="center" src="images/logoe.png"> </div>
	      </td>

	      

<form method="POST" action="partidas3.php">

              <td height="33.3%" width="33.3%" id="bordet">
	      <div align="center">
	      <table>

	      <tr><td width="50%" align=right>
	      No. de Cotizacion:</td><td align=center width="50px"><input class="caja" type="text" name="id_cotizacion"value="<?php echo $id_cotizacion; ?>" ></td></tr>

	      <tr><td width="50%" align=right>
	      Fecha: </td><td align=center width="50px"><?php echo $fecha; ?> </td></tr>

              <tr><td width="50%" align=right>
              Vigencia en Días: </td><td align=center width="50px"><input class="caja" type="text" placeholder="No Vigencia en Días" name="vigencia">
              </td></tr>

              <tr><td width="50%" align=right>
                Partidas: </td><td align=center width="50px"><?php
              	$sql="SELECT `partida` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
		$resultado = query($sql,$conexion);
		while ($campo = mysql_fetch_array($resultado)){
		$no_partida=$no_partida+1;
		} echo $no_partida?> </td></tr>

	      </table>
              
	      </div>
	      </td>

	</tr>

	<tr>

            
               
	      <td id="bordet"><div align="center">Av. Juárez No. 9-2, Col. San Mateo Ixtacalco,
              <br>Cuautitlán Izcalli, Estado de México, C.P. 54713
              <br>ventas@artefactosluminicos.com.mx
              <br>www.artefactosluminicos.com.mx </div>
	      </td>
              <td id="bordet"  align="left" ><br><h3>Condiciones de Venta</h3>
                   <br>*Precios sujetos a cambio sin previo aviso.
                   <br>*Cotizaciones confirmadas en dolares hacer pago en dolares a la cuenta 451244981 
                   CLABE 012180004512449814 de Bancomer.
                   <br>*Toda devolución autorizada causará un cargo del 35%.
                   <br>*No se aceptan cancelaciones.
                   <br>*La empresa se reserva el derecho de hacer cargos por
		   almacenaje 72 hrs. posteriores al aviso de mercancia preparada.
                   <br>*Cualquier modificación de este documento lo invalidará.
	     </td>

	</tr>
</table>
	<br><br>

<table border=0 cellspacing="2px" width="90%">                  												
            <tr> <td id="bordet">              
	     <div align="center"><div id="tform">Datos del Cliente</div>              
	     <?php echo "$empresa<br>"."$calle "."int $num_int,"." ext $num_ext ".",$municipio<br>"."$estado, "."$cp"; ?>
	     </div><br>
             </td>

             <td id="bordet">
             <div align="center"><div id="tform">Datos de Contacto</div> 
             <textarea  class="cajaa" align="Center" name="datos_cliente" rows="4" cols="28" ><?php echo "$nombre_c\n"."Departamento de $departamento\n"."Tels: $telefono1, "."$telefono2\n"."$e_mail_c"; ?></textarea></div><br>
             </td>
             <td id="bordet">
             <div align="center"><div id="tform">Datos del Vendedor</div>
             <?php echo "$nombre<br>"."$e_mail "; ?> </div><br>
             </td>

	</tr>
       
	</table>

	</div>


	 <div id="tform" align="center">PONEMOS A SU AMABLE CONSIDERACIÓN EL SIGUIENTE PRESUPUESTO</div> <br>

	<div align="center">
	<table   border="4px" width="950" cellspacing="1px">
		
		<thead>
		<tr>
			<th width="10%">Partida</th>
			<th width="10%">Cantidad</th>
			<th width="10%">Unidad</th>
			<th width="10%">Catálogo</th>
			<th width="40%">Descripción</th>
			<th width="10%">P. Unitario</th>
			<th width="10%">P. Total</th>
		</tr>
		</thead>

<?php

$subtotal=0;

//Obtener "tabla Partidas"
$sql="SELECT `partida`,`cantidad`,`unidad`,`catalogo`,`descripcion`,`precio_uni`,`precio_total` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
$resultado = query($sql,$conexion);
while ($campo = mysql_fetch_array($resultado)){
echo 
"<tr>".
"<td align='center'>".$campo['partida']."</td>".
"<td align='center'>".$campo['cantidad']."</td>".
"<td align='center'>".$campo['unidad']."</td>".
"<td align='center'>".$campo['catalogo']."</td>".
"<td align='justify'>".$campo['descripcion']."</td>".
"<td>".$campo['precio_uni']."</td>".
"<td>".$campo['precio_total']."</td>".
"</tr>";
$subtotal=$subtotal+$campo['precio_total'];
$nom_partida=$nom_partida+1;
}
$iva=$subtotal*0.16;
$subsubtotal=$iva+$subtotal;
$total=$subsubtotal/0.80;
$_SESSION['subtotal']=$subtotal;
$_SESSION['total']=$total;
$_SESSION['iva']=$iva;

echo "</table></div>";
?><br><br>

	<table width="950"><tr><td> <!-- Tabla para la division de NOTAS y DIVISA -->
	
	<div align="left">
	<table border="5px" width="500px">
		<thead>

		<tr>
			<th width="20%" align="center" colspan="2" id="sin_borde">NOTAS</th>
						
		</tr>

		<tr>
			<th width="20%" align="center">No de Nota</th>
			<th width="80%" align="center">Descripción</th>
			
		</tr>
		</thead>
		<?php

		//Obtener Datos de la empresa a cotizar "tabla Partidas"
		$sql="SELECT `no_nota`,`descripcion` FROM `Notas` WHERE `id_cotizacion` = '$id_cotizacion'";
		$resultado = query($sql,$conexion);
		while ($campo = mysql_fetch_array($resultado)){
		echo 
		"<tr>".
		"<td align='center'>".$campo['no_nota']."</td>".
		"<td align='justify'>".$campo['descripcion']."</td>".
		"</tr>";
		}
		echo 
	"</table></div>";
		?>
	
	
	</td><td> <!-- FIN E INICIO DEL <td> de la Tabla para la division de NOTAS y DIVISA -->

	<div align="right">
	<table border=2 id="total">

	    <tr >	
	    <td><h3 align="center">DIVISA</h3></td>
	    <td>
	    <select id="divisa" name="divisa">
  	    <option value="M.N." name="mn">M.N</option>
	    <option value="Dolar" name="dolar">Dolares</option>
	    </select>
	    </td>
	    </tr>

	    <tr>
	    <td><h3 align="center">&nbsp;&nbsp;SUBTOTAL&nbsp;&nbsp;&nbsp;</h3></td>
	    <td align="center"><?php  echo $subtotal; ?></td>
	    </tr>
	
	    <tr>
	    <td><h3 align="center">I.V.A.</h3></td>
	    <td align="center"><?php  echo $iva; ?></td>
	    </tr>

	    <tr>
	    <td><h3 align="center">TOTAL</h3></td>
	    <td align="center"><?php  echo $total; ?></td>
	    </tr>
	
	</table>
	</div>


</td></tr></table> <!-- FIN de la Tabla para la division de NOTAS y DIVISA -->
	
<br><br><br>
	<table border=1 cellspacing="2px">
		<tr>
		<td>
		Condiciones de Entrega<br>
		*El tiempo de entrega corre a partir de recibir su pedido original firmado<br> haciendo referencia a este número de cotización y de confirmar el 			anticipó<br> correspondiente en nuestra cuenta.<br>
		*Para embalajes especiales considerar cargos extras.<br>
		*Los fletes foraneos corren por cuenta y riesgo del cliente.<br>
		*En pedidos mínimo de $12,500.00 L.A.B. D.F. y zona metropolitana, excepto postes.<br>
		*No se liberan materiales sin el pago total de la mercancia.
		</td>

		<td width="210px">
		<h3 align="center">Tiempo de Entrega</h3><br><br>
		<div align="center"><input class="caja" type="text" placeholder="Tiempo de Entrega" name="t_entrega"  align="center"> </div>
		</td>
	
		<td width="210px">
		<h3 align="center">Condiciones de Pago</h3><br><br>
		<div align="center"><input class="caja" type="text" placeholder="Condiciones de Pago" name="c_pago"  align="center"></div>
		</td>
		</tr>
	</table>
	</div><br><br>
       
	       <input type="submit" value="Crear">

</form>

</body>

</html>

