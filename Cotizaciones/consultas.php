<?php

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$i = 0;
$activo = 1;
//for($i=0;$i<=1355;$i++)
//{
$sql = "UPDATE Catalogo SET activo='$activo' WHERE no_producto='$i'";
$resultado = query($sql, $conexion);
//}
?>