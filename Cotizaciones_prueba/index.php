<!DOCTYPE html >
<?php
session_start();

//incluimos el archivo con las funciones
include ("funciones_mysql.php");
//Funcion que conecta la base de datos
$conexion = conectar();
$no_version = 1;

$sql = "SELECT version FROM Version WHERE version_no='$no_version'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) {
    $version = $campo['version'];
}
?>

<head>
    <title>Consecutivo de cotizaciones</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page">
        <div id="header">
            <h1><a href="#">Bestlight M&eacute;xico S.A. de C.V.</a></h1>
            <div id="header">
                <ul>


                </ul>
            </div>
        </div>
        <table border=5 cellspacing="5px">
            <tr><td>

                    <div id="intro">
                        <h2>Consecutivo de cotizaciones</h2>

                        <p>Les presentamos el Nuevo Consecutivo de Cotizaciones <?php echo $version; ?> donde podremos cotizar en linea a nuestros 
                            respectivos clientes y tener un mejor control en el &aacute;rea de ventas. 
                            <br>
                        <p align="center" >Para continuar de clic en el botón Siguiente</p>
                        <a href="log_in.php" ><div class="button">Siguiente</div></a></div>
                </td></tr></table>       
</body>
</html>

