<?php
session_start();
if (!isset($_SESSION['usuarioc'])) {
    header('Location: log_in.php');
}

//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$id_user = $_SESSION['usuarioc'];


$rfc = $_POST['rfc'];
$empresa = $_POST['empresa'];
$calle_num = $_POST['calle_num'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$contacto = $_POST['contacto'];
$departamento = $_POST['departamento'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$email = $_POST['email'];


//Funcion que conecta la base de datos
$conexion = conectar();



//Obtener el id_num_cliente Siguente
$sql = "SELECT * FROM Clientes ORDER BY `id_num_cliente` DESC LIMIT 1";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_assoc($resultado);
$id_num_cliente = $campo['id_num_cliente'] + 1;



//Obtener el permiso con el que cuenta el usuario
$sql = "SELECT * FROM Usuarios WHERE id_usuario = '$id_user'";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_assoc($resultado);
$permiso_usuario=$campo['permiso'];

if($permiso_usuario==1) $permiso="Administrador";
else $permiso="Vendedor";




//Obtener el id_direccion Siguente
$sql = "SELECT `id_direccion` FROM Direcciones ORDER BY `id_direccion` DESC LIMIT 1";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_row($resultado)) {
    $id_direccion = $campo[0] + 1;
}

//Obtener el id_contacto Siguente
$sql = "SELECT `id_contacto` FROM Contacto ORDER BY `id_contacto` DESC LIMIT 1";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_row($resultado)) {
    $id_contacto = $campo[0] + 1;
}



//Agregar Campos en la Tabla Clientes
$sql = "INSERT INTO Clientes (id_num_cliente, id_cliente, empresa, id_direccion, id_contacto, id_usuario, desactivado, permiso) VALUES ('$id_num_cliente', '$rfc','$empresa','$id_direccion','$id_contacto','$id_user','0','$permiso')";
$resultado = query($sql, $conexion);


//Agregar Campos en la Tabla Direcciones
$sql = "INSERT INTO Direcciones (id_direccion, calle_num, municipio, estado, cp) VALUES ('$id_direccion','$calle_num','$municipio','$estado','$cp')";
$resultado = query($sql, $conexion);


//Agregar Campos en la Tabla Contacto
$sql = "INSERT INTO Contacto (id_contacto, nombre_c, departamento, telefono1, telefono2, e_mail_c) VALUES ('$id_contacto','$contacto','$departamento','$telefono1','$telefono2','$email')";
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

            <div id="main">
                <div class="ic"></div>


                <script type="text/javascript">
                    function regresar() {
                        alert("Se ha agregado el cliente con Exito");
                        document.location.href = 'index.php';
                    }
                    regresar()
                </script>


                </html>

                <?php
//}
                ?>
