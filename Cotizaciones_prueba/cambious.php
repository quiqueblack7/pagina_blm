<html>
    <br><br>
    <div id="adouser"><div style="margin-left: 95px;">Seleccione el usuario a modificar:</div></div>
    <form action="cambiousuarion.php" method="POST">
        <?php
//Usuario Conectado

        if (!isset($_SESSION['usuario'])) {
            header('Location: relogin.php');
        } else {


            $id_usuario = $_SESSION['usuario'];


//Funcion que conecta la base de datos
            $conexion = conectar();


//Seleccionamos Los nombres de los clientes segun usuario
            $sql = "SELECT nombre, apellido_p FROM `Usuarios` WHERE activo='1'";
            $resultado = query($sql, $conexion);

//Generamos el menu desplegable
            echo '<select id=cambioselect name=nombre>';
            while ($campo = mysql_fetch_array($resultado)) {
                echo '<option value="' . $campo["nombre"] . '"' . '>' . $campo["nombre"] . ' ' . $campo["apellido_p"];
            }
            echo '</select>';
            ?>

            <input type="submit" value="Modificar" class="formu-button">

        <?php } ?>
        </html>
