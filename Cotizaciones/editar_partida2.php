<?php

session_start();


header('Content-Type: text/html; charset=UTF-8');
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$id_cotizacion = $_SESSION['cotizacion'];
$id_partida = $_GET['id_partida'];
$partida = $_POST['partida'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$catalogo = $_POST['catalogo'];
$descripcion = $_POST['descripcion'];
$precio_uni = $_POST['precio_uni'];
$precio_total = $precio_uni * $cantidad;

$partida = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $partida
);

$catalogo = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $catalogo
);

$descripcion = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $descripcion
);


$sql = "UPDATE Partidas SET partida='$partida', cantidad='$cantidad', unidad='$unidad', catalogo='$catalogo', descripcion='$descripcion', precio_uni='$precio_uni', precio_total='$precio_total' WHERE id_cotizacion='$id_cotizacion' and id_partida='$id_partida'";
$resultado = query($sql, $conexion);
if ($resultado) {
    header("Location: partidas.php");
}
?>