<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_cotizacion = $_SESSION['cotizacion'];
header('Content-Type: text/html; charset=UTF-8');

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();


$vigencia = $_POST['vigencia'];

$no_partidas = $_SESSION['no_partidas'];
$divisa = $_POST['divisa'];
$subtotal = $_SESSION['subtotal'];
$iva = $_SESSION['iva'];
$total = $_SESSION['total'];
$t_entrega = $_POST['t_entrega'];
$c_pago = $_POST['c_pago'];
$string = $_POST['datos_cliente'];
$proyecto = $_POST['proyecto'];
$datos_vendedor = $_POST['datos_vendedor'];
$datos_vendedor2 = $_POST['datos_vendedor2'];

//Agregar Campos en la Tabla Cotizaciones
$sql = "UPDATE `Cotizaciones` SET vigencia='$vigencia', no_partidas='$no_partidas', `divisa`='$divisa',`subtotal`='$subtotal',`iva`='$iva',`total`='$total',`t_entrega`='$t_entrega',`c_pago`='$c_pago', proyecto='$proyecto' WHERE `id_cotizacion`='$id_cotizacion'";
$resultado = query($sql, $conexion);

$string = str_replace(
        array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', "'"), array('�', 'a', 'a', 'a', '�', 'A', 'A', '�', 'e', 'e', '�', 'E', 'E', '�', 'i', 'i', '�', 'I', 'I', '�', 'o', 'o', '�', 'O', 'O', '�', 'u', 'u', '�', 'U', 'U', "`"), $string
);

$datos_vendedor = str_replace(
        array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', "'"), array('�', 'a', 'a', 'a', '�', 'A', 'A', '�', 'e', 'e', '�', 'E', 'E', '�', 'i', 'i', '�', 'I', 'I', '�', 'o', 'o', '�', 'O', 'O', '�', 'u', 'u', '�', 'U', 'U', "`"), $datos_vendedor
);

$datos_vendedor2 = str_replace(
        array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', "'"), array('�', 'a', 'a', 'a', '�', 'A', 'A', '�', 'e', 'e', '�', 'E', 'E', '�', 'i', 'i', '�', 'I', 'I', '�', 'o', 'o', '�', 'O', 'O', '�', 'u', 'u', '�', 'U', 'U', "`"), $datos_vendedor2
);

//Agregar Campos en la Tabla Cotizaciones
$sqla = "INSERT INTO `Datos_Cotizacion` (id_cotizacion, datos_cliente, datos_vendedor, datos_vendedor2) values ('$id_cotizacion', '$string', '$datos_vendedor', '$datos_vendedor2')";
$resultadoa = query($sqla, $conexion);


unset($_SESSION['cotizacion']);
unset($_SESSION['empresa']);
unset($_SESSION['subtotal']);
unset($_SESSION['total']);
unset($_SESSION['iva']);
unset($_SESSION['no_partidas']);
if (isset($_SESSION['cancelar'])) {
    unset($_SESSION['cancelar']);
}
?>

<html>

    <script type="text/javascript">
        function regresar() {
            alert("La cotizacion ha finalizado con exito");
            document.location.href = 'log_in.php';
        }
        regresar()

    </script>

</html>


