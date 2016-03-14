<?php

//Capturamos el usuario autenticado
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_cotizacion = $_SESSION['cotizacion'];

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();


$descripcion = $_POST['descripcion'];
$eliminar = array("<!DOCTYPE html>", "<html>", "<head>", "</head>", "<body>", "</body>", "</html>", "  ");
$descripcion = str_replace($eliminar, "", $descripcion);
trim($descripcion);

$eliminar = array("'");
$descripcion = str_replace($eliminar, "`", $descripcion);

$sql = "SELECT `no_nota` FROM `Notas` WHERE `id_cotizacion`=$id_cotizacion ORDER BY `no_nota` DESC";
$resultado = query($sql, $conexion);

$campo = mysql_fetch_row($resultado);
$no_nota = $campo[0] + 1;

if ($no_nota == "") {
    $no_nota = 1;
}






//Agregar Campos en la Tabla Partidas
$sql = "INSERT INTO Notas (id_cotizacion, no_nota, descripcion) VALUES ('$id_cotizacion','$no_nota','$descripcion')";
$resultado = query($sql, $conexion);


header("Location: notas.php");
?>
