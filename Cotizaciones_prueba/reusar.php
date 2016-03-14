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
$id_usuario = $_SESSION['usuario'];

$sql = "SELECT `id_cotizacion` FROM Cotizaciones ORDER BY `id_cotizacion` DESC LIMIT 1";
$resultado = query($sql, $con);

$campo = mysql_fetch_row($resultado);
$id_cotizacion2 = $campo[0] + 1;


$permiso = $_SESSION['permiso'];

if (isset($_GET['cliente'])) {
    $cliente = $_GET['cliente'];
} else {
    $cliente = 2;
}
?>
<html>

    <head>
        <title>Consecutivo de cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="tabla_notas.css" rel="stylesheet" type="text/css" />
    </head>

    <div id="page">
        <div id="header">
            <h1>Artefactos Lumínicos SA de CV</h1>
        </div> 

    </div>


<?php if ($cliente == 2) { ?>
        <script>
            function cliente(id_cotizacion) {
                var r = confirm('Desea cotizar al mismo cliente?');

                if (r == true) {
                    dire = "reusar.php?cliente=1&id_cotizacion=";
                    var union = dire.concat(id_cotizacion);
                    window.location = union;
                }
                else {
                    dire = "reusar.php?cliente=0&id_cotizacion=";
                    var union = dire.concat(id_cotizacion);
                    window.location = union;

                }
            }
            cliente(<?php echo $id_cotizacion ?>)
        </script>

<?php
}

//CONDICION SI SE REUTILIZA EL CLIENTE

if ($cliente == 1) {






//inicio de captura de datos
    $sql = "SELECT * FROM Cotizaciones WHERE id_cotizacion='$id_cotizacion'";
    $resultado = query($sql, $con);
    $cotizaciones = mysql_fetch_array($resultado);

    $fecha = $cotizaciones['fecha'];
    $id_num_cliente = $cotizaciones['id_cliente'];
    $id_usuario = $cotizaciones['id_usuario'];
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




    $sql = "SELECT * FROM Datos_Cotizacion WHERE id_cotizacion='$id_cotizacion'";
    $resultado = query($sql, $con);
    $datos_cotizacion = mysql_fetch_array($resultado);

    $datos_cliente = $datos_cotizacion['datos_cliente'];
    $datos_contacto = $datos_cotizacion['datos_contacto'];
    $datos_vendedor = $datos_cotizacion['datos_vendedor'];

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
}

if ($cliente == 0) {
    ?>
        <link rel="stylesheet" type="text/css" href="estilo.css">

        <div id="addcliente3" align='center' style="margin-left:-5px">Seleccione el cliente:</div>

        <?php
        echo '<form action="reusar2.php?id_cotizacion=' . $id_cotizacion . '&id_cotizacion2=' . $id_cotizacion2 . '" method="POST">';
//Seleccionamos Los nombres de los clientes segun usuario
        if ($permiso == 1) {
            $sql = "SELECT * FROM Clientes WHERE  desactivado = '0' ORDER BY empresa";
            $resultado = query($sql, $con);
        } else {
            $sql = "SELECT * FROM Clientes WHERE id_usuario = '$id_usuario' AND desactivado = '0' ORDER BY empresa";
            $resultado = query($sql, $con);
        }



//Generamos el menu desplegable
        echo '<div  align="center" ><select id=cotizarselect name=empresa>';
        while ($campo = mysql_fetch_array($resultado)) {
            echo '<option >' . $campo["empresa"] . '</option>';
        }
        echo '</select></div>';
        ?>

        <div  align="center" style="margin-left:-200px"><input type="submit" value="Cotizar" class="formu-button" > </div>
    </form>

    <?php } ?>
