<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$e_mail = $_POST['e_mail'];
$permiso = $_POST['permiso'];
$password = $_POST['password'];

//Funcion que conecta la base de datos
$conexion = conectar();



//Actualizar la tabla Usuarios
$sql = "UPDATE Usuarios  SET nombre='$nombre', apellido_p= '$apellido_p', apellido_m='$apellido_m', e_mail='$e_mail', permiso='$permiso' WHERE `id_usuario`='$usuario'";
$resultado = query($sql, $conexion);

$sql2 = "UPDATE Log_in  SET password='$password' WHERE `id_usuario`='$usuario'";
$resultado2 = query($sql2, $conexion);
?>




<!DOCTYPE html >
<html>
    <head>
        <title>Consecutivo de Cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="page">
            <div id="header">
                <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>
            </div>

            <div id="main">
                <div class="ic"></div>


                <script type="text/javascript">
                    function regresar() {
                        alert("Modificaciones realizadas con Exito");
                        document.location.href = 'administracion.php';
                    }
                    regresar()
                </script>

                </html>

























