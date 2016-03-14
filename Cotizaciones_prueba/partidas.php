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
                <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>
            </div> <br><br><br>

            <div id="modificar">

                <div id="titulo2">Generador de partidas para la cotización.</div>
                <div align="center" style="color:#5A8D9A;">Favor de no modificar la columna "Contador"</div><br>
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

                        <?php
//Capturamos el usuario autenticado
                        session_start();

//incluimos el archivo con las funciones
                        include ("funciones_mysql.php");

                        if (isset($_SESSION['cancelar'])) {
                            $cancelar = $_SESSION['cancelar'];
                        } else {
                            $cancelar = 0;
                        }

                        if (!isset($_SESSION['usuario'])) {
                            header('Location: log_in.php');
                        }
                        $id_usuario = $_SESSION['usuario'];

                        header('Content-Type: text/html; charset=UTF-8');



//Funcion que conecta la base de datos
                        $conexion = conectar();

                        if (isset($_SESSION['cotizacion'])) {
                            $id_cotizacion = $_SESSION['cotizacion'];
                        } else {
                            $sql = "SELECT `id_cotizacion` FROM Cotizaciones ORDER BY `id_cotizacion` DESC LIMIT 1";
                            $resultado = query($sql, $conexion);

                            $campo = mysql_fetch_row($resultado);
                            $id_cotizacion = $campo[0] + 1;

                            if ($id_cotizacion == "") {
                                $id_cotizacion = 1;
                            }


                            $_SESSION['cotizacion'] = $id_cotizacion;
                            $fecha = date('y.m.d');


                            if (isset($_SESSION['empresa'])) {
                                $empresa = $_SESSION['empresa'];
                            } else {
                                $empresa = $_POST['empresa'];
                                $_SESSION['empresa'] = $empresa;
                            }
//Obtener el id_num_cliente por medio de empresa
                            $sql = "SELECT * FROM `Clientes` WHERE `empresa` = '$empresa'";
                            $resultado = query($sql, $conexion);
                            $campo = mysql_fetch_array($resultado);
                            $id_num_cliente = $campo['id_num_cliente'];
                            $id_usuario = $campo['id_usuario'];


//Agregar Campos en la Tabla Cotizaciones
                            $sql = "INSERT INTO Cotizaciones (id_cotizacion, fecha, id_cliente, id_usuario) VALUES ('$id_cotizacion','$fecha','$id_num_cliente','$id_usuario')";
                            $resultado = query($sql, $conexion);
                        }
                        ?>
                        <form action="ordenar.php" method="POST">
                            <?php
                            $siguiente = 0;
//Obtener Datos de la empresa a cotizar "tabla Partidas"
                            $sql = "SELECT * FROM `Partidas` WHERE `id_cotizacion`='$id_cotizacion' ORDER BY id_partida";
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
                                "<td>" . "<input type=text name='orden" . $contador . "' value=" . $campo['id_partida'] . " size=4px style='text-align: center;' required>" . "</td>" .
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
                                "<td>" . "<input type=text name='catalogo" . $contador . "' value=" . $campo['no_partida'] . " size=4px style='text-align: center;' required>" . "</td>" .
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











