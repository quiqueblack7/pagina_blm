<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <?php
    if (!isset($_SESSION['usuario'])) {
        header('Location: relogin.php');
    } else {



        $id_usuario = $_SESSION['usuario'];


//Funcion que conecta la base de datos
        $conexion = conectar();

        $cont = 0;
        $sql = "SELECT `id_catalogo` FROM `Catalogo` WHERE activo = '1'";
        $resultado = query($sql, $conexion);
        while ($campo = mysql_fetch_array($resultado)) {
            $cont = 1;
        }

        if ($cont == 1) {
            ?>

            <div id="addproducto">Seleccione el producto que desea cambiar:</div>
            <form action="cambioproducto.php" method="POST">



        <?php
//Seleccionamos Los nombres de los clientes segun usuario
        $sql = "SELECT `id_catalogo` FROM `Catalogo`  WHERE activo='1' ORDER BY `id_catalogo`";
        $resultado = query($sql, $conexion);

        //Generamos el menu desplegable
        echo '<select id=cambioselect name=catalogo>';
        while ($campo = mysql_fetch_array($resultado)) {
            echo '<option>' . $campo["id_catalogo"];
        }
        echo '</select>';
        ?>

                <input type="submit" value="Modificar" class="formu-button" >

            <?php }
            if ($cont == 0) {
                ?>

                <div id="errorimg">
                    <img   src="images/error.png" margin-left="40px"></div>
    <?php } ?>

        <?php } ?>
</html>