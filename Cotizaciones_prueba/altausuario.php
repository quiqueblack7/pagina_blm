<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$id_usuario = $_SESSION['usuario'];

$id_usuariog = $_POST['id_usuariog'];
$permiso = $_POST['permiso'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$e_mail = $_POST['e_mail'];
$passwordy = $_POST['passwordy'];

//Funcion que conecta la base de datos
$conexion = conectar();

//Obtener el numero Siguente
$sql = "SELECT `numero` FROM Usuarios ORDER BY `numero` DESC LIMIT 1";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_row($resultado)) {
    $numero = $campo[0] + 1;
}

//Agregar Campos en la Tabla Usuarios
$sql = "INSERT INTO Usuarios (id_usuario, permiso, nombre, apellido_p, apellido_m, e_mail, numero) VALUES ('$id_usuariog','$permiso','$nombre','$apellido_p','$apellido_m','$e_mail','$numero')";
$resultado = query($sql, $conexion);

//Agregar Campo en la Tabla Log_in
$sql = "INSERT INTO Log_In (id_usuario, password) VALUES ('$id_usuariog','$passwordy')";
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
                        alert("Se ha agregado al usuario con Exito");
                        document.location.href = 'administracion.php';
                    }
                    regresar()
                </script>


                </html>




