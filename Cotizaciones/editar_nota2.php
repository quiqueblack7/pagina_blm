<?php

//Capturamos el usuario autenticado
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_cotizacion = $_SESSION['cotizacion'];
$no_nota = $_SESSION['no_nota'];

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();


$descripcion = $_POST['descripcion'];
$eliminar = array("<!DOCTYPE html>", "<html>", "<head>", "</head>", "<body>", "</body>", "</html>", "  ");
$descripcion = str_replace($eliminar, "", $descripcion);
trim($descripcion);



$sql = "UPDATE Notas SET  descripcion='$descripcion' WHERE id_cotizacion='$id_cotizacion' and no_nota='$no_nota'";
$resultado = query($sql, $conexion);
if ($resultado) {
    header("Location: notas.php");
}
?>
