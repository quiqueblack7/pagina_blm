<?php

//Capturamos el usuario autenticado
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_usuario = $_SESSION['usuario'];
$id_cotizacion = $_SESSION['cotizacion'];

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$string = $_POST['partida'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$string2 = $_POST['catalogo'];
$string3 = $_POST['descripcion'];
$precio_uni = $_POST['precio_uni'];
$precio_total = $precio_uni * $cantidad;


$string = str_replace(
        array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', "'"), array('�', 'a', 'a', 'a', '�', 'A', 'A', '�', 'e', 'e', '�', 'E', 'E', '�', 'i', 'i', '�', 'I', 'I', '�', 'o', 'o', '�', 'O', 'O', '�', 'u', 'u', '�', 'U', 'U', "`"), $string
);

$string2 = str_replace(
        array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', "'"), array('�', 'a', 'a', 'a', '�', 'A', 'A', '�', 'e', 'e', '�', 'E', 'E', '�', 'i', 'i', '�', 'I', 'I', '�', 'o', 'o', '�', 'O', 'O', '�', 'u', 'u', '�', 'U', 'U', "`"), $string2
);

$string3 = str_replace(
        array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', "'"), array('�', 'a', 'a', 'a', '�', 'A', 'A', '�', 'e', 'e', '�', 'E', 'E', '�', 'i', 'i', '�', 'I', 'I', '�', 'o', 'o', '�', 'O', 'O', '�', 'u', 'u', '�', 'U', 'U', "`"), $string3
);



$sql = "SELECT `id_partida` FROM Partidas where id_cotizacion='$id_cotizacion' ORDER BY `id_partida` DESC LIMIT 1";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_row($resultado);
if ($campo[0] == '') {
    $id_partida = 1;
} else {

    $id_partida = $campo[0] + 1;
}

//Agregar Campos en la Tabla Partidas
$sql = "INSERT INTO Partidas (no_partida, id_partida, id_cotizacion, partida, cantidad, unidad, catalogo, descripcion, precio_uni, precio_total) VALUES ('$id_partida','$id_partida','$id_cotizacion','$string','$cantidad','$unidad','$string2','$string3','$precio_uni','$precio_total')";
$resultado = query($sql, $conexion);


if ($resultado) {
    header("Location: partidas.php");
}
?>