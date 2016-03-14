<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_usuario = $_SESSION['usuario'];
$empresa = $_SESSION['empresa'];
$id_cotizacion = $_SESSION['cotizacion'];


//Funcion que conecta la base de datos
$conexion = conectar();
$no_version = 1;

$sql = "SELECT version FROM Version WHERE version_no='$no_version'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $version = $campo['version'];
}
?>

<form action="insertar_version.php" method="POST">
    <div align="center">
        <div id="version">
            <br><br><br><br>
            <b>Ingrese versi&oacute;n actual: </b><br><br>

            <input type="text" class="formu" placeholder="<?php echo $version; ?>" name="version_actual" style="text-align:center" required><br>

            <input type="submit" value="Actualizar" id="boton_versionn"><br><br>

            S&oacute;lo encargado de sistemas puede llenar este campo.

            <br><br><br><br><br>
        </div>  
    </div>
</form>