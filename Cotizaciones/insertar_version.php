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

$version = $_POST['version_actual'];

$version_no = 1;

//Agregar Campo en la Tabla Version
$sql = "UPDATE `Version` SET version='$version' WHERE `version_no`='$version_no'";
$resultado = query($sql, $conexion);


unset($_POST['version']);
?>

<html>

    <script type="text/javascript">
        function regresar() {
            alert("Version actualizada");
            document.location.href = 'administracion.php?sec=version';
        }
        regresar()

    </script>

</html>