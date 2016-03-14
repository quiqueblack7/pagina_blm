<?php

//Capturamos el usuario autenticado
session_start();

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

$con = conectar();

if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

$id_cotizacion = $_GET['id_cotizacion'];
$id_cotizacion2 = $_GET['id_cotizacion2'];
$empresa = $_POST['empresa'];

echo $id_cotizacion;
echo $id_cotizacion2;
echo $empresa;

$sql = "SELECT * FROM Clientes WHERE empresa='$empresa'";
$resultado = query($sql, $con);
$clientes = mysql_fetch_array($resultado);
$id_num_cliente = $clientes['id_num_cliente'];


//inicio de captura de datos
$sql = "SELECT * FROM Cotizaciones WHERE id_cotizacion='$id_cotizacion'";
$resultado = query($sql, $con);
$cotizaciones = mysql_fetch_array($resultado);

$id_usuario = $cotizaciones['id_usuario'];
$fecha = $cotizaciones['fecha'];
$vigencia = $cotizaciones['vigencia'];
$no_partidas = $cotizaciones['no_partidas'];
$divisa = $cotizaciones['divisa'];
$subtotal = $cotizaciones['subtotal'];
$iva = $cotizaciones['iva'];
$total = $cotizaciones['total'];
$t_entrega = $cotizaciones['t_entrega'];
$c_pago = $cotizaciones['c_pago'];
$descuento = $cotizaciones['descuento'];
$activo = $cotizaciones['activo'];

$sql = "INSERT INTO Cotizaciones (id_cotizacion, fecha, id_cliente, id_usuario, vigencia, no_partidas, divisa, subtotal, iva, total, t_entrega, c_pago, descuento, activo) VALUES ('$id_cotizacion2','$fecha','$id_num_cliente','$id_usuario','$vigencia','$no_partidas','$divisa','$subtotal','$iva','$total','$t_entrega','$c_pago','$descuento','$activo')";
$resultado = query($sql, $con);




$sql = "SELECT `id_direccion` FROM `Clientes` WHERE `empresa`='$empresa'";
$resultado = query($sql, $con);
$campo = mysql_fetch_array($resultado);
$id_direccion = $campo['id_direccion'];

$sql = "SELECT `calle`,`num_int`,`num_ext`,`municipio`,`estado`,`cp` FROM Direcciones WHERE id_direccion=$id_direccion";
$resultado = query($sql, $con);
$campo = mysql_fetch_array($resultado);
$calle = $campo['calle'];
$num_int = $campo['num_int'];
$num_ext = $campo['num_ext'];
$municipio = $campo['municipio'];
$estado = $campo['estado'];
$cp = $campo['cp'];

$sql = "SELECT `id_contacto` FROM `Clientes` WHERE `empresa`='$empresa'";
$resultado = query($sql, $con);
$campo = mysql_fetch_array($resultado);
$id_contacto = $campo['id_contacto'];

$sql = "SELECT nombre_c, departamento, telefono1, telefono2, e_mail_c FROM Contacto WHERE id_contacto='$id_contacto'";
$resultado = query($sql, $con);
$campo = mysql_fetch_array($resultado);
$nombre_c = $campo['nombre_c'];
$departamento = $campo['departamento'];
$telefono1 = $campo['telefono1'];
$telefono2 = $campo['telefono2'];
$e_mail_c = $campo['e_mail_c'];

$sql = "SELECT * FROM Datos_Cotizacion WHERE id_cotizacion='$id_cotizacion'";
$resultado = query($sql, $con);
$datos_cotizacion = mysql_fetch_array($resultado);

$sql = "SELECT * FROM Usuarios WHERE id_usuario='$id_usuario'";
$resultado = query($sql, $con);
$usuario = mysql_fetch_array($resultado);
$nombre = $usuario['nombre'];
$apellido_p = $usuario['apellido_p'];
$e_mail = $usuario['e_mail'];


$datos_cliente = "$empresa " . "$calle " . "int $num_int," . " ext $num_ext " . ",$municipio " . "$estado, " . "$cp";
$datos_contacto = "$nombre_c\n" . "Departamento de $departamento\n" . "Tels: $telefono1, " . "$telefono2\n" . "$e_mail_c";
$datos_vendedor = "$nombre " . "$apellido_p\n" . "$e_mail";

$sql = "INSERT INTO Datos_Cotizacion (id_cotizacion, datos_cliente, datos_contacto, datos_vendedor) VALUES ('$id_cotizacion2','$datos_cliente','$datos_contacto','$datos_vendedor')";

$resultado = query($sql, $con);





$sql = "SELECT * FROM Partidas WHERE id_cotizacion='$id_cotizacion'";
$resultado = query($sql, $con);
while ($partidas = mysql_fetch_array($resultado)) {
    $id_partida = $partidas['id_partida'];
    $partida = $partidas['partida'];
    $cantidad = $partidas['cantidad'];
    $unidad = $partidas['unidad'];
    $catalogo = $partidas['catalogo'];
    $descripcion = $partidas['descripcion'];
    $precio_uni = $partidas['precio_uni'];
    $precio_total = $partidas['precio_total'];

    $sql = "INSERT INTO Partidas (id_partida, id_cotizacion, partida, cantidad, unidad, catalogo, descripcion, precio_uni, precio_total) VALUES ('$id_partida','$id_cotizacion2','$partida','$cantidad','$unidad','$catalogo','$descripcion','$precio_uni','$precio_total')";
    $resultado1 = query($sql, $con);
}





$sql = "SELECT * FROM Notas WHERE id_cotizacion='$id_cotizacion'";
$resultado = query($sql, $con);
while ($notas = mysql_fetch_array($resultado)) {
    $no_nota = $notas['no_nota'];
    $descripcion_nota = $notas['descripcion'];

    $sql = "INSERT INTO Notas (id_cotizacion, no_nota, descripcion) VALUES ('$id_cotizacion2','$no_nota','$descripcion_nota')";
    $resultado1 = query($sql, $con);
}

header("Location: editar_cotizacion.php?id_cotizacion=$id_cotizacion2");
?>