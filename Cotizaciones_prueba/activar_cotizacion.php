<?php
session_start();

$permiso = $_SESSION['permiso'];

if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

header('Content-Type: text/html; charset=UTF-8');

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$cotizacion = $_GET['id_cotizacion'];

$sql = "UPDATE Cotizaciones SET activo='1' WHERE id_cotizacion = '$cotizacion'";
$resultado = query($sql, $conexion);


//unset($_SESSION['cotizacion']);
//unset($_SESSION['empresa']);
?>

<?php if ($permiso == 1) { ?>


    <html>

        <script type="text/javascript">
            function regresar() {

                document.location.href = 'administracion.php?sec=cotizaciones';
            }
            regresar()

        </script>

    </html>

    <?php
} else {
    ?>

    <html>

        <script type="text/javascript">
            function regresar() {

                document.location.href = 'ventas.php?sec=cotizaciones';
            }
            regresar()

        </script>

    </html>
<?php } ?>