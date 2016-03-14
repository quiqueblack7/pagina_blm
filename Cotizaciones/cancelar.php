<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

header('Content-Type: text/html; charset=UTF-8');

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$cotizacion = $_SESSION['cotizacion'];

$sql = "DELETE FROM Cotizaciones WHERE id_cotizacion = '$cotizacion'";
$resultado = query($sql, $conexion);


$sql1 = "DELETE FROM Partidas WHERE id_cotizacion = '$cotizacion'";
$resultado1 = query($sql1, $conexion);


$sql2 = "DELETE FROM Notas WHERE id_cotizacion = '$cotizacion'";
$resultado2 = query($sql2, $conexion);


unset($_SESSION['cotizacion']);
unset($_SESSION['empresa']);
?>

<html>

    <script type="text/javascript">
        function regresar() {

            document.location.href = 'log_in.php';
        }
        regresar()

    </script>

</html>
