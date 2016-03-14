<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$id_catalogo = $_POST['id_catalogo'];
$unidad = $_POST['unidad'];
$descripcion = $_POST['descripcion'];

//Funcion que conecta la base de datos
$conexion = conectar();

//echo $id_catalogo."<br>";
//echo $unidad."<br>";
//echo $descripcion."<br>";
//Actualizar la tabla Clientes
$sql = "UPDATE `Catalogo` SET `unidad`='$unidad',`descripcion`= '$descripcion' WHERE `id_catalogo`='$id_catalogo'";
$resultado = query($sql, $conexion);

if ($resultado) {
    echo "bien";
} else {
    echo 'mal';
}
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
