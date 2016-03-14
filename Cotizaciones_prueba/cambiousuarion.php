<?php
//Capturamos el usuario autenticado
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}


//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

//Obtenemos el nombre de la empresa por el metodo POST
$nombre = $_POST['nombre'];


//Obtener Datos de la empresa a cambiar "tabla clientes"
$sql = "SELECT * FROM `Usuarios` WHERE `nombre` = '$nombre'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $id_usuario = $campo['id_usuario'];
    $permiso = $campo['permiso'];
    $nombre = $campo['nombre'];
    $apellido_p = $campo['apellido_p'];
    $apellido_m = $campo['apellido_m'];
    $e_mail = $campo['e_mail'];
}

//Obtener Datos de la empresa a cambiar "tabla clientes"
$sql = "SELECT password FROM `Log_in` WHERE `id_usuario` = '$id_usuario'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $password = $campo['password'];
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

                <div id="titulo2">Modifique los apartados del usuario:</div>

                <form action="cambiousuarion2.php" method="POST">

                    <table align="center" border=0 id="tablacambio" cellspacing="5">

                        <tr><td>Nombre de Usuario<br><input type="text" class="formu"  name="usuario" value="<?php echo$id_usuario; ?>" autofocus  ></td>

                            <td>Nombre<br><input type="text" class="formu"  name="nombre" value="<?php echo$nombre; ?>" autofocus required></td></tr>

                        <tr><td>Apellido Paterno<br><input type="text" class="formu"  name="apellido_p" value="<?php echo$apellido_p; ?>" autofocus required></td>

                            <td>Apellido Materno<br><input type="text" class="formu"  name="apellido_m" value="<?php echo$apellido_m; ?>" autofocus ></td></tr>

                        <tr><td>E-Mail<br><input type="text" class="formu"  name="e_mail" value="<?php echo$e_mail; ?>" autofocus></td>

                            <td>Permisos<br><input type="text" class="formu"  name="permiso" value="<?php echo$permiso; ?>" autofocus required></td></tr>

                        <td>Password<br><input type="text" class="formu"  name="password" value="<?php echo$password; ?>" autofocus required></td></tr>

                    </table>
            </div>

            <div id=centrarcambio> 

                <input type="submit" value="MODIFICAR!" class="formu-button2">

                </form>

                <a href="administracion.php"><button class="formu-button2"><div id="cambio">CANCELAR</div></button></a>


            </div>

</html>






