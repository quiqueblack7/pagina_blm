<html>
    <?php
    //Usuario Conectado


    $cont = 0;

    if (!isset($_SESSION['usuario'])) {
        header('Location: log_in.php');
    }
    $id_usuario = $_SESSION['usuario'];

//Funcion que conecta la base de datos
    $conexion = conectar();

    $sql = "SELECT `empresa` FROM `Clientes` WHERE `id_usuario` = '$id_usuario' AND `desactivado` = '0' ";
    $resultado = query($sql, $conexion);

//Generamos el menu desplegable

    while ($campo = mysql_fetch_array($resultado)) {
        $cont = 1;
    }

    if ($cont == 1) {
        ?>
        <link rel="stylesheet" type="text/css" href="estilo.css">

        <div id="addcliente3">Seleccione el cliente a cotizar:</div>
        <form action="partidas.php" method="POST">
            <?php
//Seleccionamos Los nombres de los clientes segun usuario
            $sql = "SELECT `empresa` FROM `Clientes` WHERE `id_usuario` = '$id_usuario' AND `desactivado` = '0' ORDER BY empresa";
            $resultado = query($sql, $conexion);

//Generamos el menu desplegable
            echo '<select id=cotizarselect name=empresa>';
            while ($campo = mysql_fetch_array($resultado)) {
                echo '<option style="width:520px;">' . $campo["empresa"] . '</option>';
                $conectar = 1;
            }
            echo '</select>';
            ?>

            <input type="submit" value="Cotizar" class="formu-button">

            <?php
        }
        if ($cont == 0) {
            ?> 
            <div id="errorimg">
                <img  src="images/error.png" margin-left="40px"></div>
        <?php }
        ?>
</html>







