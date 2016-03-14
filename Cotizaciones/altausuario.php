<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

$id_usuariog = $_POST['id_usuariog'];
$permiso = $_POST['permiso'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$e_mail = $_POST['e_mail'];
$passwordy = $_POST['passwordy'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];


//Funcion que conecta la base de datos
$conexion = conectar();

//Obtener el numero Siguente
$sql = "SELECT * FROM Usuarios ORDER BY numero DESC LIMIT 1";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_row($resultado)) {
    $numero = $campo[0] + 1;
}

//Agregar Campos en la Tabla Usuarios
$sql = "INSERT INTO Usuarios (id_usuario, permiso, nombre, apellido_p, apellido_m, e_mail, numero, telefono1, telefono2) VALUES ('$id_usuariog','$permiso','$nombre','$apellido_p','$apellido_m','$e_mail','$numero', '$telefono1', '$telefono2')";
$resultado = query($sql, $conexion);

//Agregar Campo en la Tabla Log_in
$sql = "INSERT INTO Log_In (id_usuario, password) VALUES ('$id_usuariog','$passwordy')";
$resultado = query($sql, $conexion);

header("Location: index.php?sec=altaus&altaus=si")
?>
