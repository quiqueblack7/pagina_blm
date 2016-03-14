<?php
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
$catalogo = $_POST['catalogo'];


//Obtener Datos de la empresa a cambiar "tabla clientes"
$sql = "SELECT * FROM `Catalogo` WHERE `id_catalogo` = '$catalogo'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $id_catalogo = $campo['id_catalogo'];
    $unidad = $campo['unidad'];
    $descripcion = $campo['descripcion'];
}

if ($unidad == 'PZA.') {
    $i = 1;
}
if ($unidad == 'CJTO.') {
    $i = 2;
}
if ($unidad == 'JGO.') {
    $i = 3;
}
if ($unidad == 'ROLLO') {
    $i = 4;
}
if ($unidad == 'METRO') {
    $i = 5;
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

                <div id="titulo2">Modifique los apartados del producto:</div>

                <form action="cambioproducto2.php" method="POST">

                    <table align="center" border=0 id="tablacambio" cellspacing="5">

                        <tr><td>Cat&aacute;logo<br><input type="text" class="formu"  name="id_catalogo" value="<?php echo$id_catalogo; ?>" autofocus required ></td>

                            <td><select style="background-color: white" class="formu" name="unidad" required>
                                    <option style="background-color: #DADADA" disabled selected>Unidad</option>
                                    <option name="PZA." <?php if ($i == 1) {
    echo"selected";
} ?> >PZA.</option>
                                    <option name="JGO." <?php if ($i == 3) {
    echo"selected";
} ?>>JGO.</option>
                                    <option name="METRO" <?php if ($i == 5) {
    echo"selected";
} ?>>METRO.</option>
                                    <option value="CJTO." <?php if ($i == 2) {
    echo"selected";
} ?>>CJTO.</option>
                                    <option value="ROLLO" <?php if ($i == 4) {
    echo"selected";
} ?>>ROLLO</option>
                                </select></td></tr>

                        <tr><td colspan="2">Descripcion<br><textarea  class="formuca" name="descripcion" required>  <?php echo$descripcion; ?> </textarea></td>	

                    </table>
            </div>

            <div id=centrarcambio> 

                <input type="submit" value="MODIFICAR!" class="formu-button2">

                </form>

                <a href="ventas.php"><button class="formu-button2"><div id="cambio">CANCELAR</div></button></a>


            </div>

</html>

