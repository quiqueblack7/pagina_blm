<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
//incluimos el archivo con las funciones
include ("funciones_mysql.php");


$id = $_GET['id'];
$id_usuario = $_SESSION['usuario'];
$rfc = $_POST['rfc'];
$empresa = $_POST['empresa'];
$calle = $_POST['calle'];
$num_int = $_POST['num_int'];
$num_ext = $_POST['num_ext'];
$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$contacto = $_POST['contacto'];
$departamento = $_POST['departamento'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$email = $_POST['email'];

//Funcion que conecta la base de datos
$conexion = conectar();

//Obtener el id_direccion id_contacto
$sql = "SELECT * FROM `Clientes` WHERE `id_num_cliente` = '$id'";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_array($resultado);
$id_direccion = $campo['id_direccion'];
$id_contacto = $campo['id_contacto'];

//echo $id;
//Actualizar la tabla Clientes
$sql = "UPDATE `Clientes` SET `id_cliente`='$rfc',`empresa`='$empresa' WHERE `id_num_cliente`='$id'";
$resultado = query($sql, $conexion);

//Actualizar la tabla Direcciones
$sql = "UPDATE `Direcciones` SET `calle`= '$calle',`num_int`='$num_int',`num_ext`= '$num_ext',`municipio`= '$municipio', colonia= '$colonia', `estado`='$estado',`cp`='$cp' WHERE `id_direccion`='$id_direccion' ";
$resultado = query($sql, $conexion);

//Actualizar la tabla Contacto
$sql = "UPDATE `Contacto` SET `nombre_c`='$contacto',`departamento`= '$departamento',`telefono1`='$telefono1',`telefono2`='$telefono2',`e_mail_c`='$email' WHERE `id_contacto`='$id_contacto'";
$resultado = query($sql, $conexion);
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
                        document.location.href = 'log_in.php';
                    }
                    regresar()
                </script>

                </html>

























