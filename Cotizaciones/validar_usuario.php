<?php

session_start();


if (isset($_SESSION['usuarioc'])) {
    header('Location: log_in.php');
}

$_SESSION['usuarioc'] = $_POST['id_usuario'];
$_SESSION['password'] = $_POST['password'];

$id_usuario = $_SESSION['usuarioc'];
$password = $_SESSION['password'];

$usuario = 'ninguno';
$pass = 'ninguno';



//CONECTA Y SELECCIONA BASE DE DATOS
$link = mysql_connect("localhost", "bestl_servidor", "Zzs99vmoNT1krok!");
mysql_select_db("bestli01_pagina_cotizaciones", $link) OR DIE("Error: No es posible establecer la conexi&oacute;n");

//GUARDA QUERY EN $query
$query = "SELECT `id_usuario`, `password` FROM `Log_In` WHERE `id_usuario`='$id_usuario' and `password`='$password'";

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
    header("Location: index.php?sec=log_in&op=mal");
} else {

//GUARDA QUERY EN $query
    $query = "SELECT * FROM `Usuarios` WHERE `id_usuario`='$id_usuario' ";

//GENERA LA QUERY
    $result = mysql_query($query);

//SI EXISTE RESULTADO GUARDA LAS VARIABLES
    if ($row = mysql_fetch_assoc($result)) {
        $permiso = $row['permiso'];
        $activo = $row['activo'];
    }


    if ($permiso == '1' && $activo == '1') {
        $_SESSION['permiso'] = '1';
        header("Location: index.php");
    }

    if ($permiso == '2' && $activo == '1') {
        $_SESSION['permiso'] = '2';
        header("Location: index.php");
    }

    if ($activo == '0') {

        session_destroy();
        header("Location: log_in.php?op=desactivado");
    }
}
?>
