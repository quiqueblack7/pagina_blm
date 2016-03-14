<?php
session_start();
if (!isset($_GET['op']))
    $op = NULL;
else
    $op = $_GET['op'];
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
<!DOCTYPE html >

<head>
    <title>Consecutivo de cotizaciones</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="Fondo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page">
        <div id="header">
            <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>

            <ul>


            </ul>

        </div>
        <div id="intro" >
            <h2>Consecutivo de cotizaciones</h2>



<?php
if (isset($_SESSION['usuario'])) {
    $id_usuario = $_SESSION['usuario'];
//Funcion que conecta la base de datos
//GUARDA QUERY EN $query
    $query = "SELECT `permiso`, activo FROM `Usuarios` WHERE `id_usuario`='$id_usuario' ";
//GENERA LA QUERY
    $result = mysql_query($query);
//SI EXISTE RESULTADO GUARDA LAS VARIABLES
    while ($campo = mysql_fetch_array($result)) {
        $permiso = $campo['permiso'];
        $activo = $campo['activo'];
    }
    if ($permiso == '1' && $activo == '1') {
        header("Location: administracion.php");
    }

    if ($permiso == '2' && $activo == '1') {
        header("Location: ventas.php");
    }
} else {
    ?>


                <form action="validar_usuario.php" method="POST">

                    <input type="text" class="sign-up-input" placeholder="Usuario" name="id_usuario" autofocus required>
                    <input type="password" class="sign-up-input" placeholder="Contraseña" name="password" required>
                    <input type="submit" value="Entrar" class="sign-up-button">
                </form>


    <?php
}
?>



        </div>

            <?php if ($op == 'desactivado') { ?>
            <script>
                alert('Este usuario ha sido desactivado \nPongase en contacto el Administrador');
            </script>
    <?php
}
?>

<?php if ($op == 'mal') { ?>
            <script>
                alert('ERROR\nUsuario y/o contraseña erroneos, intente de nuevo');
            </script>
            <?php
        }
        ?>

        <div id="letraversion">Versi&oacute;n <?php echo $version; ?></div>
</body>
</html>
