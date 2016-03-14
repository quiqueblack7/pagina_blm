<?php
	session_start();

	if (!isset($_SESSION['usuario'])) 
	{
		header('Location: index.php');
	}

	include ("funciones_mysql.php");

	$conexion = conectar();

	$nombre = $_GET['nombre'];

	$sql = "UPDATE `Usuarios` SET `activo`='0' WHERE `nombre`='$nombre'";
	$resultado = query($sql, $conexion);

	header("Location: index.php?sec=bajaus&borrar=si");
?>
