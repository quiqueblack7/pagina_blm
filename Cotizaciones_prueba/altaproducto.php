<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$id_usuario = $_SESSION['usuario'];
$id_catalogo = $_POST['catalogo'];
$unidad = $_POST['unidad'];
$descripcion = $_POST['descripcion'];



//Funcion que conecta la base de datos
$conexion = conectar();






//Agregar Campos en la Tabla Catalogo
$sql = "INSERT INTO Catalogo (id_catalogo, unidad, descripcion, activo) VALUES ('$id_catalogo','$unidad','$descripcion','1')";
$resultado = query($sql, $conexion);
?>

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

    <body>
        <div id="page">
            <div id="header">
                <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>
                
            </div>





            <script type="text/javascript">
                function regresar() {
                    alert("Se ha agregado el producto con Exito");
                    document.location.href = 'log_in.php';
                }
                regresar()
            </script>


</html>


