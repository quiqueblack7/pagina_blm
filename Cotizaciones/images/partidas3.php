<?php
session_start();
$id_cotizacion=$_SESSION['cotizacion'];
header('Content-Type: text/html; charset=UTF-8');

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();


$vigencia=$_POST['vigencia'];
$no_partidas=$_POST['no_partidas'];
$divisa=$_POST['divisa'];
$subtotal=$_SESSION['subtotal'];
$iva=$_SESSION['iva'];
$total=$_SESSION['total'];
$t_entrega=$_POST['t_entrega'];
$c_pago=$_POST['c_pago'];


//Agregar Campos en la Tabla Cotizaciones
$sql = "UPDATE `Cotizaciones` SET vigencia='$vigencia',`no_partidas`='$no_partidas',`divisa`='$divisa',`subtotal`='$subtotal',`iva`='$iva',`total`='$total',`t_entrega`='$t_entrega',`c_pago`='$c_pago' WHERE `id_cotizacion`='$id_cotizacion'";
$resultado = query($sql,$conexion);




unset($_SESSION['cotizacion']);
unset($_SESSION['empresa']);
unset($_SESSION['subtotal']);
unset($_SESSION['total']);
unset($_SESSION['iva']);


?>

<html>

<script type="text/javascript">
function regresar() {
    alert("La cotizacion se ha realizado con exito");
	document.location.href= 'pdf.php';
}
regresar()

</script>

</html>


