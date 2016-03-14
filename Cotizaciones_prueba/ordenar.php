<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

$conexion = conectar();

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


$catalogo1 = $_POST['catalogo1'];
$catalogo2 = $_POST['catalogo2'];
$catalogo3 = $_POST['catalogo3'];
$catalogo4 = $_POST['catalogo4'];
$catalogo5 = $_POST['catalogo5'];
$catalogo6 = $_POST['catalogo6'];
$catalogo7 = $_POST['catalogo7'];
$catalogo8 = $_POST['catalogo8'];
$catalogo9 = $_POST['catalogo9'];
$catalogo10 = $_POST['catalogo10'];
$catalogo11 = $_POST['catalogo11'];
$catalogo12 = $_POST['catalogo12'];
$catalogo13 = $_POST['catalogo13'];
$catalogo14 = $_POST['catalogo14'];
$catalogo15 = $_POST['catalogo15'];
$catalogo16 = $_POST['catalogo16'];
$catalogo17 = $_POST['catalogo17'];
$catalogo18 = $_POST['catalogo18'];
$catalogo19 = $_POST['catalogo19'];
$catalogo20 = $_POST['catalogo20'];
$catalogo21 = $_POST['catalogo21'];
$catalogo22 = $_POST['catalogo22'];
$catalogo23 = $_POST['catalogo23'];
$catalogo24 = $_POST['catalogo24'];
$catalogo25 = $_POST['catalogo25'];
$catalogo26 = $_POST['catalogo26'];
$catalogo27 = $_POST['catalogo27'];
$catalogo28 = $_POST['catalogo28'];
$catalogo29 = $_POST['catalogo29'];
$catalogo30 = $_POST['catalogo30'];

$sqla = "UPDATE `Partidas` SET id_partida='$orden1' WHERE `no_partida`='$catalogo1'";
$resultadoa = query($sqla, $conexion);

$sql1 = "UPDATE `Partidas` SET id_partida='$orden2' WHERE `no_partida`='$catalogo2'";
$resultado1 = query($sql1, $conexion);

$sql2 = "UPDATE `Partidas` SET id_partida='$orden3' WHERE `no_partida`='$catalogo3'";
$resultado2 = query($sql2, $conexion);

$sql3 = "UPDATE `Partidas` SET id_partida='$orden4' WHERE `no_partida`='$catalogo4'";
$resultado3 = query($sql3, $conexion);

$sql4 = "UPDATE `Partidas` SET id_partida='$orden5' WHERE `no_partida`='$catalogo5'";
$resultado4 = query($sql4, $conexion);

$sql5 = "UPDATE `Partidas` SET id_partida='$orden6' WHERE `no_partida`='$catalogo6'";
$resultado5 = query($sql5, $conexion);

$sql6 = "UPDATE `Partidas` SET id_partida='$orden7' WHERE `no_partida`='$catalogo7'";
$resultado6 = query($sql6, $conexion);

$sql7 = "UPDATE `Partidas` SET id_partida='$orden8' WHERE `no_partida`='$catalogo8'";
$resultado7 = query($sql7, $conexion);

$sql8 = "UPDATE `Partidas` SET id_partida='$orden9' WHERE `no_partida`='$catalogo9'";
$resultado8 = query($sql8, $conexion);

$sql9 = "UPDATE `Partidas` SET id_partida='$orden10' WHERE `no_partida`='$catalogo10'";
$resultado9 = query($sql9, $conexion);

$sql10 = "UPDATE `Partidas` SET id_partida='$orden11' WHERE `no_partida`='$catalogo11'";
$resultado10 = query($sql10, $conexion);

$sql11 = "UPDATE `Partidas` SET id_partida='$orden12' WHERE `no_partida`='$catalogo12'";
$resultado11 = query($sql11, $conexion);

$sql12 = "UPDATE `Partidas` SET id_partida='$orden13' WHERE `no_partida`='$catalogo13'";
$resultado12 = query($sql12, $conexion);

$sql13 = "UPDATE `Partidas` SET id_partida='$orden14' WHERE `no_partida`='$catalogo14'";
$resultado13 = query($sql13, $conexion);

$sql14 = "UPDATE `Partidas` SET id_partida='$orden15' WHERE `no_partida`='$catalogo15'";
$resultado14 = query($sql14, $conexion);

$sql15 = "UPDATE `Partidas` SET id_partida='$orden16' WHERE `no_partida`='$catalogo16'";
$resultado15 = query($sql15, $conexion);

$sql16 = "UPDATE `Partidas` SET id_partida='$orden17' WHERE `no_partida`='$catalogo17'";
$resultado16 = query($sql16, $conexion);

$sql17 = "UPDATE `Partidas` SET id_partida='$orden18' WHERE `no_partida`='$catalogo18'";
$resultado17 = query($sql17, $conexion);

$sql18 = "UPDATE `Partidas` SET id_partida='$orden19' WHERE `no_partida`='$catalogo19'";
$resultado18 = query($sql18, $conexion);

$sql19 = "UPDATE `Partidas` SET id_partida='$orden20' WHERE `no_partida`='$catalogo20'";
$resultado19 = query($sql19, $conexion);

$sql20 = "UPDATE `Partidas` SET id_partida='$orden21' WHERE `no_partida`='$catalogo21'";
$resultado20 = query($sql20, $conexion);

$sql21 = "UPDATE `Partidas` SET id_partida='$orden22' WHERE `no_partida`='$catalogo22'";
$resultado21 = query($sql21, $conexion);

$sql22 = "UPDATE `Partidas` SET id_partida='$orden23' WHERE `no_partida`='$catalogo23'";
$resultado22 = query($sql22, $conexion);

$sql23 = "UPDATE `Partidas` SET id_partida='$orden24' WHERE `no_partida`='$catalogo24'";
$resultado23 = query($sql23, $conexion);

$sql24 = "UPDATE `Partidas` SET id_partida='$orden25' WHERE `no_partida`='$catalogo25'";
$resultado24 = query($sql24, $conexion);

$sql25 = "UPDATE `Partidas` SET id_partida='$orden26' WHERE `no_partida`='$catalogo26'";
$resultado25 = query($sql25, $conexion);

$sql26 = "UPDATE `Partidas` SET id_partida='$orden27' WHERE `no_partida`='$catalogo27'";
$resultado26 = query($sql26, $conexion);

$sql27 = "UPDATE `Partidas` SET id_partida='$orden28' WHERE `no_partida`='$catalogo28'";
$resultado27 = query($sql27, $conexion);

$sql28 = "UPDATE `Partidas` SET id_partida='$orden29' WHERE `no_partida`='$catalogo29'";
$resultado28 = query($sql28, $conexion);

$sql29 = "UPDATE `Partidas` SET id_partida='$orden30' WHERE `no_partida`='$catalogo30'";
$resultado29 = query($sql29, $conexion);
?>

<html>

    <script type="text/javascript">
        function regresar() {
            alert("El ordenamiento se ha realizado");
            document.location.href = 'partidas.php';
        }
        regresar()

    </script>

</html>


