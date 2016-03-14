<html>
    <script type="text/javascript">
        function irAlIndice() {
            if (confirm("¿Quieres Eliminarlo")) {
                document.location.href = 'bajausuarion.php';
            }
        }
    </script>

    <br><br>
    <div id="adouser"><div style="margin-left: 55px;">Seleccione el usuario que desea eliminar:</div></div>
    <form action="bajausuarion.php" method="POST">



        <?php
//Usuario Conectado



        if (!isset($_SESSION['usuario'])) {
            header('Location: relogin.php');
        } else {
//incluimos el archivo con las funciones



            $id_usuario = $_SESSION['usuario'];


//Funcion que conecta la base de datos
            $conexion = conectar();


//Seleccionamos Los nombres de los usuarios 
            $sql = "SELECT nombre, apellido_p FROM `Usuarios` WHERE activo='1'";
            $resultado = query($sql, $conexion);

//Generamos el menu desplegable
            echo '<select id=bajaselect name=nombre>';
            while ($campo = mysql_fetch_array($resultado)) {
                echo '<option>' . $campo["nombre"] . ' ' . $campo["apellido_p"];
            }
            echo '</select>';
            ?>

            <input type="submit" value="Eliminar" class="formu-button" >

        </form>


    <?php } ?>
</html>


