<?php
if (!isset($_GET['sec'])) {
    $seccion = null;
} else {
    $seccion = $_GET['sec'];
}

//Capturamos el usuario autenticado
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_usuario = $_SESSION['usuario'];

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

//Obtenemos el nombre de la empresa por el metodo POST


if (isset($_POST['catalogo'])) {
    $catalogo = $_POST['catalogo'];
} else {
    $catalogo = $_GET['catalogo'];
}
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

            </div> <br><br><br>

            <div id="modificar">

                <div id="titulo">Realmente desea borrar el producto <br>    <?php echo'<div id=empresadel>" ' . $catalogo . ' "</div>'; ?> </div>


                <div id=centrarbaja>    

                    <a href="?sec=borrar&catalogo=<?php echo $catalogo; ?>"><button class="formu-button2"><div id="cambioboton">Aceptar</div></button></a>

                    <a href="log_in.php"><button class="formu-button2"><div id="cambioboton">Cancelar</div></button></a>

                </div>


                <?php
                $activo = 0;
                if ($seccion == "borrar") {
                    $catalogo = $_GET['catalogo'];

//Cambiar el campo "desactivado" para Eliminar de la interfaz
                    $sql = "UPDATE Catalogo SET activo='$activo' WHERE id_catalogo='$catalogo'";
                    $resultado = query($sql, $conexion);
                    ?>
                    <script type="text/javascript">
                        function eliminado() {
                            alert("Se ha eliminado con Éxito");
                            document.location.href = 'log_in.php';
                        }
                        eliminado()
                    </script>

                    <?php
                }


                if ($seccion == "") {
                    
                }
                ?>    		
