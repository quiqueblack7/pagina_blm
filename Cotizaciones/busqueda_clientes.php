<?php
  $sql = "SELECT nombre, apellido_p, apellido_m, permiso FROM Usuarios WHERE id_usuario = '$id_usuario'";
  $resultado = query($sql, $conexion);
  $campo = mysql_fetch_array($resultado);
  $permiso = $campo['permiso'];
  $nombre = $campo['nombre'];
  $apellido_p = $campo['apellido_p'];
  $apellido_m = $campo['apellido_m'];
?>

<div class="CSSTableGenerator">
  <table width="1000px">
    <tr>
      <td width='4%'><h3>No.</h3></td>
      <td width='10%'><h3>Empresa</h3></td>
      <td width='4%'><h3>RFC</h3></td>
      <td width='43%'><h3>Dirección</h3></td>
      <td width='43%'><h3>Contacto</h3></td>
      <?php
        if ($permiso == 1) {
          echo "<td width='10%'><h3>Vendedor</h3></td>";
        }
      ?>
    </tr>
    <?php
      if ($permiso == 2) {
        echo "<div align='center'><div id='caja_cat' >Clientes de <br>$nombre $apellido_p $apellido_m</div></div><br>";
      }
      if ($permiso == 2) {
        $sql = "select * from Clientes where id_cliente like '%$rfc%' AND id_usuario = '$id_usuario' AND desactivado = 0";
      } else {
        $sql = "select * from Clientes where id_cliente like '%$rfc%' AND desactivado = 0";
      }
      $resultado = query($sql, $conexion);
      while ($campo = mysql_fetch_array($resultado)) {
        $id_usuario = $campo['id_usuario'];
        $id_direccion = $campo['id_direccion'];
        $id_contacto = $campo['id_contacto'];
        $permiso1 = $campo['permiso'];

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

        echo "
          <tr>" .
          "<td id='sombra2'>" . $campo['id_num_cliente'] . "</td>" .
          "<td id='sombra2'>" . $campo['empresa'] . "</td>" .
          "<td id='sombra2'>" . $campo['id_cliente'] . "</td>" .
          "<td id='sombra2'>" . $calle_num . "--" . $colonia . "--" . $municipio . "--" . $estado . "--" . $cp . "</td>" .
          "<td id='sombra2'>" . $nombre_c . "-" . $departamento . "--" . $telefono1 . "--" . $telefono2 . "--" . $e_mail_c . "</td>
        ";
        if ($permiso == 1) {
          echo "<td id='sombra2'>" . $permiso1 . " " .$nombre_usuario . "</td>";
        }
        echo "<tr>";
        }
    ?>
  </table>
</div>
