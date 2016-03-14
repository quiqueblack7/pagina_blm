<?php

session_start();


$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['password'] = $_POST['password'];

$id_usuario = $_SESSION['usuario'];
$password = $_SESSION['password'];

$usuario = 'ninguno';
$pass = 'ninguno';

//CONECTA Y SELECCIONA BASE DE DATOS
$link = mysql_connect("localhost", "bestl_servidor", "Zzs99vmoNT1krok!");
mysql_select_db("bestli01_pagina_cotizaciones", $link) OR DIE("Error: No es posible establecer la conexi&oacute;n");



//GUARDA QUERY EN $query
$query = "SELECT * FROM Registro WHERE id_usuario='$id_usuario' AND password='$password'";

//GENERA LA QUERY
$result = mysql_query($query);

//LEE LA QUERY
while ($row = mysql_fetch_assoc($result)) {

//SI EXISTE RESULTADO HACE EL IF	
    if ($row['id_usuario'] == $id_usuario) {
        $usuario = $row['id_usuario'];
        $pass = $row['password'];
    }
}




if ($usuario == 'ninguno' || $pass == 'ninguno') {
    $_SESSION=null;
    header("Location: login4.php?op=mal");
} 
else {
	
	echo "hola";

//GUARDA QUERY EN $query
    $query = "SELECT * FROM `Registro` WHERE `id_usuario`='$usuario' ";

//GENERA LA QUERY
    $result = mysql_query($query);

//SI EXISTE RESULTADO GUARDA LAS VARIABLES
    if ($row = mysql_fetch_assoc($result)) {
        $tipo_usuario = $row['tipo_usuario'];
    }


    
        $_SESSION['tipo_usuario'] = $tipo_usuario;
        header("Location: index.php");
    

}
?>




