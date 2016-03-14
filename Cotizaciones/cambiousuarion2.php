<?php
	session_start();

	//incluimos el archivo con las funciones
	include ("funciones_mysql.php");

	$usuario = $_GET['usuario'];
	$nombre = $_POST['nombre'];
	$apellido_p = $_POST['apellido_p'];
	$apellido_m = $_POST['apellido_m'];
	$e_mail = $_POST['e_mail'];
	$permiso = $_POST['permiso'];
	$password = $_POST['password'];

	//Funcion que conecta la base de datos
	$conexion = conectar();

	$sql = "SELECT * FROM Usuarios WHERE id_usuario = '$usuario'";
	$resultado = query($sql, $conexion);
	while ($campo = mysql_fetch_array($resultado)) 
	{
		$no_usuario = $campo['no_usuario'];
	}
	
	/*
	echo $usuario."<br />".$nombre."<br />".$apellido_p."<br />".$apellido_m."<br />".$e_mail."<br />".$permiso."<br />".$password;
	*/
	
	$sql3 = "UPDATE Usuarios SET nombre = '$nombre', permiso = '$permiso', apellido_p = '$apellido_p', apellido_m = '$apellido_m', e_mail = '$e_mail' WHERE no_usuario='$no_usuario'";
	$resultado3 = query($sql3, $conexion);
	
	//Actualizar la tabla Usuarios
	$sql2 = "UPDATE Log_In SET password='$password' WHERE no_usuario='$no_usuario'";
	$resultado2 = query($sql2, $conexion);

		
	
	header("Location: index.php?sec=cambious&cambioUs=hecho");
	
?>