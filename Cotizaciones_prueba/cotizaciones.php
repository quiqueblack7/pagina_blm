<link href="tabla2.css" rel="stylesheet" type="text/css" />
<style type="text/css" media="screen">
    A:link {color: black; font-size: 8pt; font-family: arial; text-decoration: none }
    A:hover {color: black; font-size: 8pt; font-family: arial; text-decoration: none }
    A:visited {color: black; font-size: 8pt; font-family: arial; text-decoration: none }
</style>

<script>
    function Eliminar(id_cotizacion) {
        var r = confirm("Esta seguro que desea eliminar la cotizacion?");
        if (r == true) {
            dire = "eliminar_cotizacion.php?id_cotizacion=";
            var union = dire.concat(id_cotizacion);
            window.location = union;
        }
    }
</script>


<?php
//Capturamos el usuario 


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_usuario = $_SESSION['usuario'];


$cont = 0;
//Funcion que conecta la base de datos
$conexion = conectar();

//Obtener Datos de la empresa a cambiar "tabla clientes"
$sql = "SELECT * FROM `Cotizaciones` WHERE `id_usuario` = '$id_usuario' AND activo = '1'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $cont = 1;
}

if ($cont == 1) {
    ?>
    <div id="barra">
        <div class="CSSTableGenerator" >
            <table align="center">

                <tr>

                    <td width="15%">No de Cotizaci&oacute;n</td>
                    <td width="10%">Fecha</td>
                    <td width="60%">Cliente</td>
                    <td width="15%" height="25px" colspan="3">Gesti&oacute;n</td>


                </tr>



                <?php
//Obtener Datos de la empresa a cambiar "tabla clientes"
                $sql = "SELECT * FROM `Cotizaciones` WHERE `id_usuario` = '$id_usuario' AND activo = '1' ORDER BY id_cotizacion DESC";
                $resultado = query($sql, $conexion);
                while ($campo = mysql_fetch_array($resultado)) {
                    $id_cliente = $campo['id_cliente'];
                    $id_cotizacion = $campo['id_cotizacion'];

                    echo "<tr>";

                    echo "<td align='center'>" . $campo['id_cotizacion'] . "</td>";

                    echo "<td align='center'>" . $campo['fecha'] . "</td>";

                    $id_num_cliente = $campo['id_num_cliente'];

                    $sql2 = "SELECT empresa FROM `Clientes` WHERE id_num_cliente = '$id_cliente'";
                    $resultado2 = query($sql2, $conexion);
                    $campo2 = mysql_fetch_array($resultado2);

                    echo "<td>" . $campo2['empresa'] . "</td>";

                    echo "<td height='35px'> "
                    . "<a href='ver_cotizacion.php?id_cotizacion=" . $id_cotizacion . "' ><div class='ver' align='center'>Ver</div></a></td><td height='35px'>"
                    . "<a href='editar_cotizacion.php?id_cotizacion=" . $id_cotizacion . "' ><div class='editar' align='center'> Editar</div></a> <br> <a href='reusar.php?id_cotizacion=" . $id_cotizacion . "' ><div class='reusar' align='center'>Reusar</div></a></td><td>"
                    . "<div class='eliminar' align='center' onclick='Eliminar(" . $id_cotizacion . ")'> Eliminar</div></td>";

                    echo "</tr>";
                }
                ?>
            </table>


        </div>
    </div>
    <?php ?>



<?php } ?>

<?php
if ($cont == 0) {
    ?>
    <div  align="center" style="margin:120px 0 200px 0;">
        <img  src="images/error.png" margin-left="40px"></div>
<?php } ?>




