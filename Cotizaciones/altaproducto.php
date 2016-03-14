<?php
	session_start();

	if (!isset($_SESSION['usuario']))
	{
		header('Location: index.php');
	}

	include ("funciones_mysql.php");

	$conexion = conectar();

	//Obtener el numero Siguente
	$sql = "SELECT * FROM Catalogo ORDER BY id_catalogo DESC LIMIT 1";
	$resultado = query($sql, $conexion);
	while ($campo = mysql_fetch_row($resultado)) {
	    $id_catalogo = $campo[0] + 1;
	}

	$catalogo = $_POST['catalogo'];
	$unidad = $_POST['unidad'];
	$descripcion = $_POST['descripcion'];

	$sql = "INSERT INTO Catalogo (id_catalogo, catalogo, unidad, descripcion, activo) VALUES ('$id_catalogo', '$catalogo','$unidad','$descripcion','1')";
	$resultado = query($sql, $conexion);

	header('Location: index.php?sec=alta_p&producto=agregado');
?>
