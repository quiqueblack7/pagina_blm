<?php

//Capturamos el usuario autenticado
session_start();

//incluimos el archivo con las funciones
include ("funciones_mysql.php");



if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_usuario = $_SESSION['usuario'];

header('Content-Type: text/html; charset=UTF-8');



//Funcion que conecta la base de datos
$conexion = conectar();

$id_cotizacion = $_GET['id_cotizacion'];

$sql = "SELECT `id_cliente` FROM `Cotizaciones` WHERE `id_cotizacion` = '$id_cotizacion'";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_array($resultado);
$id_cliente = $campo['id_cliente'];

$sql = "SELECT `empresa` FROM `Clientes` WHERE `id_cliente` = '$id_cliente'";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_array($resultado);
$empresa = $campo['empresa'];



$_SESSION['cotizacion'] = $id_cotizacion;
$_SESSION['empresa'] = $empresa;
$_SESSION['cancelar'] = 1;
header('Location: partidas.php');
?>