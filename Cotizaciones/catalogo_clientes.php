<?php
	$sql = "SELECT * FROM Usuarios WHERE id_usuario = '$id_usuario'";
	$resultado = query($sql, $conexion);
	$campo = mysql_fetch_array($resultado);
	$permiso1 = $campo['permiso'];
	$nombre = $campo['nombre'];
	$apellido_p = $campo['apellido_p'];
	$apellido_m = $campo['apellido_m'];

	if ($permiso1 == 2)
	{
		echo "<div align='center'><div id='caja_cat' align='center'>Clientes de <br>$nombre $apellido_p $apellido_m:</div></div><br>";
		$sql = "SELECT * FROM Clientes WHERE id_usuario = '$id_usuario' and desactivado='0'";
	}
	else
	{
		echo "<div align='center'><div id='caja_cat''>Todos los Clientes:</div></div><br>";
		$sql = "SELECT * FROM Clientes WHERE desactivado = 0";
	}
?>
<div class="CSSTableGenerator">
    <table>
        <?php
		echo
		'
			<tr>
			<td>No.</td>
			<td>Empresa</td>
			<td>RFC</td>
			<td>Dirección</td>
			<td>Contacto</td>
			<td>Tipo</td>
			</tr>
		';
        $resultado = query($sql, $conexion);
        while ($campo = mysql_fetch_array($resultado)) {
                $id_usuario = $campo['id_usuario'];
                $id_direccion = $campo['id_direccion'];
								$id_contacto = $campo['id_contacto'];
								$id_num_cliente = $campo['id_num_cliente'];
								$permiso = $campo['permiso'];


                $sqla = "SELECT * FROM Direcciones WHERE id_direccion='$id_direccion'";
                $resultadoa = query($sqla, $conexion);
                $campoa = mysql_fetch_array($resultadoa);
                $calle_num = $campoa['calle_num'];
                $colonia = $campoa['colonia'];
                $municipio = $campoa['municipio'];
                $estado = $campoa['estado'];
                $cp = $campoa['cp'];




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
                "<td>" . $campo['id_num_cliente'] . "</td>" .
				"<td>" . $campo['empresa'] . "</td>" .
				"<td>" . $campo['id_cliente'] . "</td>" .
                "<td>" . $calle_num . "--" . $colonia . "--" . $municipio . "--" . $estado . "--" . $cp . "</td>" .
                "<td>" . $nombre_c . "-" . $departamento . "--" . $telefono1 . "--" . $telefono2 . "--" . $e_mail_c . "</td>";
                if ($permiso1 == 1) {
                    echo "<td>" . $permiso . " " .$nombre_usuario . "</td>";
                }
                echo "<tr>";
            }

        ?>
    </table>
</div>
