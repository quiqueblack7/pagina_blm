<?php
session_start();

//incluimos el archivo con las funciones
                        include ("funciones_mysql.php");

                        if (isset($_SESSION['cancelar'])) {
                            $cancelar = $_SESSION['cancelar'];
                        } else {
                            $cancelar = 0;
                        }

                        header('Content-Type: text/html; charset=UTF-8');

						if (isset($_SESSION['empresa']))
							{
                $empresa = $_SESSION['empresa'];
              }

            if (isset($_SESSION['usuarioc']))
							{
                $id_usuario = $_SESSION['usuarioc'];
              }

							else
							{
                                $empresa = $_POST['empresa'];
                                $_SESSION['empresa'] = $empresa;
                            }



//Funcion que conecta la base de datos
                        $conexion = conectar();

						$sql = "SELECT id_direccion FROM  Clientes  WHERE  empresa ='$empresa'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$id_direccion = $campo['id_direccion'];
							}

							$sql = "SELECT  id_contacto  FROM  Clientes  WHERE  empresa ='$empresa'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$id_contacto = $campo['id_contacto'];
							}

							$sql = "SELECT nombre_c, departamento, telefono1, telefono2, e_mail_c FROM Contacto WHERE id_contacto='$id_contacto'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$nombre_c = $campo['nombre_c'];
								$departamento = $campo['departamento'];
								$telefono1 = $campo['telefono1'];
								$telefono2 = $campo['telefono2'];
								$e_mail_c = $campo['e_mail_c'];
							}

							$sql = "SELECT nombre, apellido_p, apellido_m, e_mail FROM Usuarios WHERE id_usuario='$id_usuario'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$nombre = $campo['nombre'];
								$apellido_p = $campo['apellido_p'];
								$apellido_m = $campo['apellido_m'];
								$e_mail = $campo['e_mail'];
							}

							$nombre = "$nombre " . "$apellido_p " . "$apellido_m";


							$sql = "SELECT * FROM Direcciones WHERE id_direccion=$id_direccion";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$calle_num = $campo['calle_num'];
								$municipio = $campo['municipio'];
								$estado = $campo['estado'];
								$cp = $campo['cp'];
								$colonia = $campo['colonia'];
							}



							$sql = "SELECT  id_contacto  FROM Clientes WHERE empresa='$empresa'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$id_contacto = $campo['id_contacto'];
							}

							$sql = "SELECT  nombre_c , departamento , telefono1 , telefono2 , e_mail_c  FROM Contacto WHERE id_contacto=$id_contacto";
							$resultado = query($sql, $conexion);
							while ($campo = @mysql_fetch_array($resultado)) {
								$nombre_c = $campo['nombre_c'];
								$departamento = $campo['departamento'];
								$telefono1 = $campo['telefono1'];
								$telefono2 = $campo['telefono2'];
								$e_mail_c = $campo['e_mail_c'];
							}

							if (isset($_SESSION['cotiz_usuario']))
							{
                                $cotiz_usuario = $_SESSION['cotiz_usuario'];
                            }

							$sql = "SELECT * FROM Usuarios WHERE id_usuario='$id_usuario'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$nombre = $campo['nombre'];
								$apellido_p = $campo['apellido_p'];
								$apellido_m = $campo['apellido_m'];
								$e_mail = $campo['e_mail'];
							}


							$nombre = "$nombre " . "$apellido_p " . "$apellido_m";

							$datos_cliente= $empresa . " " . $calle_num . " " . $colonia . " C.P" . $cp . " " . $municipio . " " . $estado;
							$datos_contacto= $nombre_c . "\n" . "Departamento de" . $departamento . "\n" . "Tels: ". $telefono1 . ", " . $telefono2 . "\n" . $e_mail_c;
							$datos_vendedor= $nombre . "\n" . $e_mail ;



						if (isset($_SESSION['empresa']))
							{
                                $empresa = $_SESSION['empresa'];
                            }

							else
							{
                                $empresa = $_POST['empresa'];
                                $_SESSION['empresa'] = $empresa;
                            }


						if (!isset($_SESSION['usuarioc'])) {
							$_SESSION['cotizacion'] = 'algo';
                            header('Location: log_in.php');
                        }
						else{

						 if (isset($_SESSION['cotizacion'])) {
                            $id_cotizacion = $_SESSION['cotizacion'];
							 $_SESSION['cotizacion'] = $id_cotizacion;
                        }

						else
						{



                        $id_usuario = $_SESSION['usuario'];

                            $sql = "SELECT  id_cotizacion  FROM Cotizaciones ORDER BY  id_cotizacion  DESC LIMIT 1";
                            $resultado = query($sql, $conexion);

                            $campo = mysql_fetch_row($resultado);
                            $id_cotizacion = $campo[0] + 1;

                            if ($id_cotizacion == "")
							{
                                $id_cotizacion = 1;
                            }

                            $_SESSION['cotizacion'] = $id_cotizacion;

                            $fecha = date('y.m.d');





//Obtener el id_num_cliente por medio de empresa
                            $sql = "SELECT * FROM  Clientes  WHERE  empresa  = '$empresa'";
                            $resultado = query($sql, $conexion);
                            $campo = mysql_fetch_array($resultado);
                            $id_num_cliente = $campo['id_num_cliente'];
                            $id_usuario = $campo['id_usuario'];


//Agregar Campos en la Tabla Cotizaciones
                            $sql = "INSERT INTO Cotizaciones (id_cotizacion, fecha, id_cliente, id_usuario) VALUES ('$id_cotizacion','$fecha','$id_num_cliente','$id_usuario')";
                            $resultado = query($sql, $conexion);
                        }}

						$sql = "SELECT * FROM Datos_Cotizacion WHERE id_cotizacion='$id_cotizacion'";
							$resultado = query($sql, $conexion);
							while ($campo = mysql_fetch_array($resultado)) {
								$prueba = $campo['id_cotizacion'];
							}


						if(!isset($prueba)){
							$sqla = "INSERT INTO  Datos_Cotizacion  (id_cotizacion, datos_cliente, datos_contacto, datos_vendedor) values ('$id_cotizacion', '$datos_cliente', '$datos_contacto', '$datos_vendedor')";
							$resultadoa = query($sqla, $conexion);}
                        ?>
<!DOCTYPE html >
<html>
    <head>
        <title>Consecutivo de Cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="tabla_partidas.css" rel="stylesheet" type="text/css" />

        <script>
            function Cancelar() {
                var r = confirm("Esta seguro que desea cancelar la cotizacion?");
                if (r == true) {
                    location.href = "cancelar.php";
                }
            }

            function Eliminar(partida) {
                var r = confirm("Esta seguro que desea eliminar esta partida?");
                if (r == true) {
                    var dir = "eliminar_partida.php?id_partida=";
                    var union = dir.concat(partida);
                    window.location = union;
                }
            }
        </script>


    </head>

    <body>
        <div id="page">
            <div id="header">
                <h1>Best Light México SA de CV</h1>
            </div> <br><br><br>

            <div id="modificar">

                <div id="titulo2">Generador de partidas para la cotización.<br><br>
                <?php echo "Usuario: $id_usuario <br>
                Cliente actual: $empresa";echo '<br>';
                echo "Cotizaci&oacute;n No: $id_cotizacion" ?>
                <br>Favor de no modificar la columna "Contador"<br>

				</div>
                <div class="Tabla_Partidas">
                    <table  class="tablesorter" width="1000">

                        <tr>
                            <td width="5%">Orden</td>
                            <td width="5%">Partida</td>
                            <td width="5%">Cantidad</td>
                            <td width="5%">Unidad</td>
                            <td width="10%">Catálogo</td>
                            <td width="40%">Descripción</td>
                            <td width="9%">Precio unitario</td>
                            <td width="8%">Precio total</td>
                            <td width="8%">Utilidades</td>
                            <td width="5%">Contador</td>
                        </tr>


                        <form action="ordenar.php" method="POST">
                            <?php
                            $siguiente = 0;
//Obtener Datos de la empresa a cotizar "tabla Partidas"
                            $sql = "SELECT * FROM  Partidas  WHERE  id_cotizacion ='$id_cotizacion' ORDER BY no_partida";
                            $resultado = query($sql, $conexion);
                            $contador = 1;
                            while ($campo = mysql_fetch_array($resultado)) {
                                $i = $campo['precio_uni'];
                                $j = $campo['precio_total'];
                                $id_partida = $campo['id_partida'];
                                if ($i == 0 || $j == 0) {

                                } else {
                                    $precio_unit = number_format("$i", 2);
                                    $precio_total = number_format("$j", 2);
                                }
                                echo
                                "<tr>" .
                                "<td>" . "<input type=text name='orden" . $contador . "' value=" . $campo['no_partida'] . " size=4px style='text-align: center;' required>" . "</td>" .
                                "<td>" . $campo['partida'] . "</td>";
                                if ($campo['cantidad'] == 0) {
                                    echo
                                    "<td align='right'> </td>";
                                } else {
                                    echo
                                    "<td>" . $campo['cantidad'] . "</td>";
                                }
                                echo
                                "<td>" . $campo['unidad'] . "</td>" .
                                "<td>" . $campo['catalogo'] . "</td>" .
                                "<td> " . $campo['descripcion'] . "</td>";
                                if ($i == 0 || $j == 0) {
                                    echo
                                    "<td align='right'> </td>" .
                                    "<td align='right'> </td>";
                                } else {
                                    echo
                                    "<td align='right'>" . number_format($campo['precio_uni'], 2) . "</td>" .
                                    "<td align='right'>" . number_format($campo['precio_total'], 2) . "</td>";
                                }
                                echo
                                "<td align='right'> <a href='editar_partida.php?id_partida=" . $id_partida . "' style='margin:0 10px 0 -10px;' ><img src='images/edit.png'></a> <img src='images/delete.png' onclick='Eliminar(" . $id_partida . ")'>  </td>" .
                                "<td>" . "<input type=text name='catalogoo" . $contador . "' value=" . $campo['id_partida'] . " size=4px style='text-align: center;' required>" . "</td>" .
                                "</tr>";
                                $siguiente = $siguiente + 1;
                                $contador = $contador + 1;
                            }
                            ?>
                    </table>
                </div>
                <input type=submit value='Reordenar' id="boton_reordenar">
						</form>
                <br><br><br>

                <table>
                    <tr>
                        <td>
                            <a href="agregar_partida.php"><input type="button" value="Agregar Partida" id="botonp" ></a>

                        </td>
                        <td>
                            <input type="button" value="C&aacute;talogo"  onclick="javascript:window.open('catalogo_productos.php', '', 'width=screen.width,height=screen.height,scrollbars=yes');"
                                   id="botonp">
                        </td>

                        <td>
                            <?php if ($siguiente > 0) { ?>
                                <a href="notas.php"><input type="button" value="Siguiente" id="botonp"></a>
<?php } ?>
                        </td>
                    <br>


                    </tr>
                </table>

                <div id="subir">
<?php if ($cancelar == 0) { ?>
                        <table border="0" widht="100px" style="margin-top: -48px; float: right;"><tr><td>
                                    <input type="button" value="Cancelar" id="botonp" onclick="Cancelar()">
                                </td></tr></table>
<?php } else { ?>
                        <table border="0" widht="100px" style="margin-top: -48px; float: right;"><tr><td>
                                    <a href="editar_form_cotizacion.php"><input type="button" value="Finalizar" id="botonp" ></a>
                                </td></tr></table>
<?php } ?>
                </div>
                <br><br><br>


</html>
