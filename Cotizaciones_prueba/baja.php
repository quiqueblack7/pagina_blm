<html>

    <script type="text/javascript">
        function irAlIndice() {

            if (confirm("¿Quieres Eliminarlo")) {

                document.location.href = 'bajausuario.php';

            }

        }

    </script>

    <?php
//Usuario Conectado



    if (!isset($_SESSION['usuario'])) {
        header('Location: relogin.php');
    }
//incluimos el archivo con las funciones



    $id_usuario = $_SESSION['usuario'];


//Funcion que conecta la base de datos
    $conexion = conectar();

    $cont = 0;
    $sql = "SELECT `empresa` FROM `Clientes` WHERE `id_usuario` = '$id_usuario' AND `desactivado` = '0' ";
    $resultado = query($sql, $conexion);
    while ($campo = mysql_fetch_array($resultado)) {
        $cont = 1;
    }

    if ($cont == 1) {
        ?>

        <div id="addcliente"><div style="margin-top: -180px;">Seleccione el cliente que desea eliminar:</div></div>
        <form action="bajausuario.php" method="POST">



            <?php
//Seleccionamos Los nombres de los clientes segun usuario
            $sql = "SELECT `empresa` FROM `Clientes` WHERE `id_usuario` = '$id_usuario' AND `desactivado` = '0' order by empresa";
            $resultado = query($sql, $conexion);

            //Generamos el menu desplegable
            echo '<select id=bajaselect name=empresa>';
            while ($campo = mysql_fetch_array($resultado)) {
                echo '<option style="width:520px;">' . $campo["empresa"] . "</option>";
            }
            echo '</select>';
            ?>

            <input type="submit" value="Eliminar" class="formu-button" >

        <?php }
        if ($cont == 0) {
            ?>

            <div id="errorimg">
                <img   src="images/error.png" margin-left="40px"></div>
<?php } ?>



</html>
