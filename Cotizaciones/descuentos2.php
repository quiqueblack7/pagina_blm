<?php

//incluimos el archivo con las funciones
include ("funciones_mysql.php");


session_start();

//Funcion que conecta la base de datos
$con = conectar();

if (!isset($_SESSION['usuarioc'])) {
    header('Location: index.php');
}
$id_cotizacion = $_SESSION['cotizacion'];
$descuento = $_POST['descuento'];
$descuento = $descuento / 100;
//Agregar Campos en la Tabla Cotizaciones
$sql = "UPDATE Cotizaciones SET descuento='$descuento' WHERE id_cotizacion='$id_cotizacion'";
$resultado = query($sql, $con);

if (isset($_SESSION['cancelar'])) {
    $cancelar = $_SESSION['cancelar'];
    header("Location: editar_form_cotizacion.php");
} else {
    $cancelar = 0;
    header("Location: form_cotizacion.php");
}
?>
