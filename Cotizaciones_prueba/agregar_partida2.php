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
    <?php
    $partida = $_POST['partida'];
    $catalogo = $_POST['catalogo'];
    $descripcion = $_POST['descripcion'];
    $unidad = $_POST['unidad'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio_uni'];


    echo "$partida<br>";
    echo "$catalogo<br>";
    echo "$descripcion<br>";
    echo "$unidad<br>";
    echo "$cantidad<br>";
    echo "$precio<br>";
    ?>
