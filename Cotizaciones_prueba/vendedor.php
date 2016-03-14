<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
?>
<!DOCTYPE html >

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
            <h1><a href="#">Artefactos Lumínicos SA de CV</a></h1>
            <div id="menu">
                <ul>


                </ul>
            </div>
        </div>
        <div id="intro">
            <h2>Consecutivo de Cotizaciones!</h2>

            <?php
            if (isset($_POST['id_usuario'])) {

                $_SESSION['id_usuario'] = $_POST['id_usuario'];
                echo "Bienvenido! Has iniciado sesion: " . $_POST['id_usuario'];
            } else {

                if (isset($_SESSION['id_usuario'])) {
                    echo "Has iniciado Sesion: " . $_SESSION['id_usuario'];
                } else {
                    echo "Acceso Restringido";
                }
            }
            ?>

            <a href="cerrar_sesion.php">Cerrar Sesion</a>
