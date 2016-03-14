<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$orden1 = $_POST['orden1'];
$orden2 = $_POST['orden2'];
$orden3 = $_POST['orden3'];
$orden4 = $_POST['orden4'];
$orden5 = $_POST['orden5'];
$orden6 = $_POST['orden6'];
$orden7 = $_POST['orden7'];
$orden8 = $_POST['orden8'];
$orden9 = $_POST['orden9'];
$orden10 = $_POST['orden10'];
$orden11 = $_POST['orden11'];
$orden12 = $_POST['orden12'];
$orden13 = $_POST['orden13'];
$orden14 = $_POST['orden14'];
$orden15 = $_POST['orden15'];
$orden16 = $_POST['orden16'];
$orden17 = $_POST['orden17'];
$orden18 = $_POST['orden18'];
$orden19 = $_POST['orden19'];
$orden20 = $_POST['orden20'];
$orden21 = $_POST['orden21'];
$orden22 = $_POST['orden22'];
$orden23 = $_POST['orden23'];
$orden24 = $_POST['orden24'];
$orden25 = $_POST['orden25'];
$orden26 = $_POST['orden26'];
$orden27 = $_POST['orden27'];
$orden28 = $_POST['orden28'];
$orden29 = $_POST['orden29'];
$orden30 = $_POST['orden30'];




$catalogo1 = $_POST['catalogoo1'];
$catalogo2 = $_POST['catalogoo2'];
$catalogo3 = $_POST['catalogoo3'];
$catalogo4 = $_POST['catalogoo4'];
$catalogo5 = $_POST['catalogoo5'];
$catalogo6 = $_POST['catalogoo6'];
$catalogo7 = $_POST['catalogoo7'];
$catalogo8 = $_POST['catalogoo8'];
$catalogo9 = $_POST['catalogoo9'];
$catalogo10 = $_POST['catalogoo10'];
$catalogo11 = $_POST['catalogoo11'];
$catalogo12 = $_POST['catalogoo12'];
$catalogo13 = $_POST['catalogoo13'];
$catalogo14 = $_POST['catalogoo14'];
$catalogo15 = $_POST['catalogoo15'];
$catalogo16 = $_POST['catalogoo16'];
$catalogo17 = $_POST['catalogoo17'];
$catalogo18 = $_POST['catalogoo18'];
$catalogo19 = $_POST['catalogoo19'];
$catalogo20 = $_POST['catalogoo20'];
$catalogo21 = $_POST['catalogoo21'];
$catalogo22 = $_POST['catalogoo22'];
$catalogo23 = $_POST['catalogoo23'];
$catalogo24 = $_POST['catalogoo24'];
$catalogo25 = $_POST['catalogoo25'];
$catalogo26 = $_POST['catalogoo26'];
$catalogo27 = $_POST['catalogoo27'];
$catalogo28 = $_POST['catalogoo28'];
$catalogo29 = $_POST['catalogoo29'];
$catalogo30 = $_POST['catalogoo30'];

echo $orden10.'<br>'.$catalogo10;

$conexion = conectar();


$sql1 = "UPDATE `Partidas` SET no_partida='$orden1' WHERE `id_partida`='$catalogo1'";
$resultado1 = query($sql1, $conexion);

$sql2 = "UPDATE `Partidas` SET no_partida='$orden2' WHERE `id_partida`='$catalogo2'";
$resultadoa = query($sql2, $conexion);

$sql3 = "UPDATE `Partidas` SET no_partida='$orden3' WHERE `id_partida`='$catalogo3'";
$resultadoa = query($sql3, $conexion);

$sql4 = "UPDATE `Partidas` SET no_partida='$orden4' WHERE `id_partida`='$catalogo4'";
$resultadoa = query($sql4, $conexion);

$sql5 = "UPDATE `Partidas` SET no_partida='$orden5' WHERE `id_partida`='$catalogo5'";
$resultadoa = query($sql5, $conexion);

$sql6 = "UPDATE `Partidas` SET no_partida='$orden6' WHERE `id_partida`='$catalogo6'";
$resultadoa = query($sql6, $conexion);

$sql7 = "UPDATE `Partidas` SET no_partida='$orden7' WHERE `id_partida`='$catalogo7'";
$resultadoa = query($sql7, $conexion);

$sql8 = "UPDATE `Partidas` SET no_partida='$orden8' WHERE `id_partida`='$catalogo8'";
$resultadoa = query($sql8, $conexion);

$sql9 = "UPDATE `Partidas` SET no_partida='$orden9' WHERE `id_partida`='$catalogo9'";
$resultadoa = query($sql9, $conexion);

$sql10 = "UPDATE `Partidas` SET no_partida='$orden10' WHERE `id_partida`='$catalogo10'";
$resultadoa = query($sql10, $conexion);

$sql11 = "UPDATE `Partidas` SET no_partida='$orden11' WHERE `id_partida`='$catalogo11'";
$resultadoa = query($sql11, $conexion);

$sql12 = "UPDATE `Partidas` SET no_partida='$orden12' WHERE `id_partida`='$catalogo12'";
$resultadoa = query($sql12, $conexion);

$sql13 = "UPDATE `Partidas` SET no_partida='$orden13' WHERE `id_partida`='$catalogo13'";
$resultadoa = query($sql13, $conexion);

$sql14 = "UPDATE `Partidas` SET no_partida='$orden14' WHERE `id_partida`='$catalogo14'";
$resultadoa = query($sql14, $conexion);

$sql15 = "UPDATE `Partidas` SET no_partida='$orden15' WHERE `id_partida`='$catalogo15'";
$resultadoa = query($sql15, $conexion);

$sql16 = "UPDATE `Partidas` SET no_partida='$orden16' WHERE `id_partida`='$catalogo16'";
$resultadoa = query($sql16, $conexion);

$sql17 = "UPDATE `Partidas` SET no_partida='$orden17' WHERE `id_partida`='$catalogo17'";
$resultadoa = query($sql17, $conexion);

$sql18 = "UPDATE `Partidas` SET no_partida='$orden18' WHERE `id_partida`='$catalogo18'";
$resultadoa = query($sql18, $conexion);

$sql19 = "UPDATE `Partidas` SET no_partida='$orden19' WHERE `id_partida`='$catalogo19'";
$resultadoa = query($sql19, $conexion);

$sql20 = "UPDATE `Partidas` SET no_partida='$orden20' WHERE `id_partida`='$catalogo20'";
$resultadoa = query($sql2, $conexion);

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
                <h1>Artefactos Lumínicos SA de CV</h1>
            </div>

            <div id="main">
                <div class="ic"></div>
    <script type="text/javascript">
        function regresar() {
            alert("El ordenamiento se ha realizado");
            document.location.href = 'partidas.php';
        }
        regresar()

    </script>

</html>


