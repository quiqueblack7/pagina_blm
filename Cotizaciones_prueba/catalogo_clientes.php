<?php
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

header('Content-Type: text/html; charset=UTF-8');
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();
$usuario = $_SESSION['usuario'];

$sql = "SELECT nombre, apellido_p, apellido_m, permiso FROM Usuarios WHERE id_usuario = '$usuario'";
$resultado = query($sql, $conexion);
$campo = mysql_fetch_array($resultado);
$permiso = $campo['permiso'];
$nombre = $campo['nombre'];
$apellido_p = $campo['apellido_p'];
$apellido_m = $campo['apellido_m'];
?>

<div class="datagrid">
    <table width="1000px"> 
        <tr>
        <thead>
        <th width='4%'><h3>RFC</h3></th>
        <th width='10%'><h3>Empresa</h3></th>
        <th width='43%'><h3>Dirección</h3></th>
        <th width='43%'><h3>Contacto</h3></th>
        <?php
        if ($permiso == 1) {
            echo "<th width='10%'><h3>Vendedor</h";
        }
        ?>
        </thead>
        </tr>
        <?php
        $cont = 2;
        if ($permiso == 2) {
            echo "<div align='center'><div id='caja_cat' align='center'>Clientes de <br>$nombre $apellido_p $apellido_m:</div></div><br>";
            $sql = "SELECT * FROM Clientes WHERE id_usuario = '$usuario' and desactivado='0'";
        } else {
            echo "<div align='center'><div id='caja_cat''>Todos los Clientes:</div></div><br>";
            $sql = "SELECT * FROM Clientes WHERE desactivado = 0";
        }
        $resultado = query($sql, $conexion);
        while ($campo = mysql_fetch_array($resultado)) {
            if ($cont % 2 == 0) {
                $id_usuario = $campo['id_usuario'];
                $id_direccion = $campo['id_direccion'];
                $sqla = "SELECT * FROM Direcciones WHERE id_direccion='$id_direccion'";
                $resultadoa = query($sqla, $conexion);
                $campoa = mysql_fetch_array($resultadoa);
                $calle = $campoa['calle'];
                $num_int = $campoa['num_int'];
                $num_ext = $campoa['num_ext'];
                $colonia = $campoa['colonia'];
                $municipio = $campoa['municipio'];
                $estado = $campoa['estado'];
                $cp = $campoa['cp'];



                $id_contacto = $campo['id_contacto'];
                $sqlb = "SELECT * FROM Contacto WHERE id_contacto='$id_contacto'";
                $resultadob = query($sqlb, $conexion);
                $campob = mysql_fetch_array($resultadob);
                $nombre_c = $campob['nombre_c'];
                $departamento = $campob['departamento'];
                $telefono1 = $campob['telefono1'];
                $telefono2 = $campob['telefono2'];
                $e_mail_c = $campob['e_mail_c'];

                $sql5 = "select * from Usuarios where id_usuario= '$id_usuario'";
                $resultado5 = query($sql5, $conexion);
                $campo5 = mysql_fetch_array($resultado5);
                $nombre_usuario = "" . $campo5['nombre'] . " " . $campo5['apellido_p'];


                echo
                "<tr>" .
                "<td id='sombra2'>" . $campo['id_cliente'] . "</td>" .
                "<td id='sombra2'>" . $campo['empresa'] . "</td>" .
                "<td id='sombra2'>" . $calle . "--" . $num_int . "--" . $num_ext . "--" . $colonia . "--" . $municipio . "--" . $estado . "--" . $cp . "</td>" .
                "<td id='sombra2'>" . $nombre_c . "-" . $departamento . "--" . $telefono1 . "--" . $telefono2 . "--" . $e_mail_c . "</td>";
                if ($permiso == 1) {
                    echo "<td id='sombra2'>" . $nombre_usuario . "</td>";
                }
                echo "<tr>";
            } else {
                $id_direccion = $campo['id_direccion'];
                $sqla = "SELECT * FROM Direcciones WHERE id_direccion='$id_direccion'";
                $resultadoa = query($sqla, $conexion);
                $campoa = mysql_fetch_array($resultadoa);
                $calle = $campoa['calle'];
                $num_int = $campoa['num_int'];
                $num_ext = $campoa['num_ext'];
                $colonia = $campoa['colonia'];
                $municipio = $campoa['municipio'];
                $estado = $campoa['estado'];
                $cp = $campoa['cp'];

                echo
                "<tr>" .
                "<td id='sombra'>" . $campo['id_cliente'] . "</td>" .
                "<td id='sombra'>" . $campo['empresa'] . "</td>" .
                "<td id='sombra'>" . $calle . "--" . $num_int . "--" . $num_ext . "--" . $colonia . "--" . $municipio . "--" . $estado . "--" . $cp . "</td>" .
                "<td id='sombra'>" . $nombre_c . "-" . $departamento . "--" . $telefono1 . "--" . $telefono2 . "--" . $e_mail_c . "</td>";
                if ($permiso == 1) {
                    echo "<td id='sombra'>" . $nombre_usuario . "</td>";
                }
                echo "<tr>";
            }
            $cont++;
        }
        ?>
    </table>
</div>
