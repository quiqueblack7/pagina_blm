<?php
	session_start();

	if (!isset($_SESSION['usuario'])) 
	{
		header('Location: index.php');
	}

	include ("funciones_mysql.php");

	$conexion = conectar();
	
    $activo = 0;
	
	$catalogo = $_GET['catalogo'];
	
	$sql = "UPDATE Catalogo SET activo='$activo' WHERE id_catalogo='$catalogo'";
	$resultado = query($sql, $conexion);
                    
	header("Location: index.php?sec=baja_p&borrar=si");
?>

