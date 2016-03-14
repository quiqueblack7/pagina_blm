<?php

session_start();


header('Content-Type: text/html; charset=UTF-8');
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$id_cotizacion = $_SESSION['cotizacion'];
$id_partida = $_GET['id_partida'];
echo $id_cotizacion;
echo $id_partida;

$sql = "DELETE FROM Partidas WHERE id_cotizacion='$id_cotizacion' and id_partida='$id_partida'";
$resultado = query($sql, $conexion);
if ($resultado) {
    header("Location: partidas.php");
}
?>