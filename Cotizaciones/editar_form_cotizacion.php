<html>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="hoja_blanca.css" rel="stylesheet" type="text/css" />
    <div align="center">
        <div id="hoja"><!DOCTYPE html >
            <?php
//Capturamos el usuario autenticado
            session_start();
            if (!isset($_SESSION['usuario'])) {
                header('Location: log_in.php');
            }
            if (!isset($_SESSION['cotizacion'])) {
                header('Location: ventas.php?sec=cotizar');
            }
            $id_usuario = $_SESSION['usuario'];
            $empresa = $_SESSION['empresa'];
            $id_cotizacion = $_SESSION['cotizacion'];

//incluimos el archivo con las funciones
            include ("funciones_mysql.php");

//Funcion que conecta la base de datos
            $conexion = conectar();

            $fecha = date('d-m-y');

            if (isset($_SESSION['cancelar'])) {
                $cancelar = $_SESSION['cancelar'];
            } else {
                $cancelar = 0;
            }

            $sql = "SELECT * FROM Partidas ORDER BY `id_partida` DESC LIMIT 1";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_row($resultado)) {
                $id_partida = $campo[0] + 1;
            }

            $sql = "SELECT * FROM `Clientes` WHERE `empresa`='$empresa'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $id_direccion = $campo['id_direccion'];
            }

            $sql = "SELECT * FROM `Clientes` WHERE `empresa`='$empresa'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $id_contacto = $campo['id_contacto'];
            }

            $sql = "SELECT * FROM Contacto WHERE id_contacto='$id_contacto'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre_c = $campo['nombre_c'];
                $departamento = $campo['departamento'];
                $telefono1 = $campo['telefono1'];
                $telefono2 = $campo['telefono2'];
                $e_mail_c = $campo['e_mail_c'];
            }

            $sql = "SELECT * FROM Usuarios WHERE id_usuario='$id_usuario'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre = $campo['nombre'];
                $apellido_p = $campo['apellido_p'];
                $apellido_m = $campo['apellido_m'];
                $e_mail = $campo['e_mail'];
                $telefonoo1 = $campo['telefono1'];
                $telefonoo2 = $campo['telefono2'];
            }

            $nombre = "$nombre " . "$apellido_p " . "$apellido_m";


            $sql = "SELECT * FROM Direcciones WHERE id_direccion=$id_direccion";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $calle = $campo['calle'];
                $num_int = $campo['num_int'];
                $num_ext = $campo['num_ext'];
                $municipio = $campo['municipio'];
                $estado = $campo['estado'];
                $cp = $campo['cp'];
            }



            $sql = "SELECT * FROM Clientes WHERE empresa='$empresa'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $id_contacto = $campo['id_contacto'];
            }

            $sql = "SELECT * FROM Contacto WHERE id_contacto=$id_contacto";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre_c = $campo['nombre_c'];
                $departamento = $campo['departamento'];
                $telefono1 = $campo['telefono1'];
                $telefono2 = $campo['telefono2'];
                $e_mail_c = $campo['e_mail_c'];
            }

            $sql = "SELECT * FROM Usuarios WHERE id_usuario='$id_usuario'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $nombre = $campo['nombre'];
                $apellido_p = $campo['apellido_p'];
                $apellido_m = $campo['apellido_m'];
                $e_mail = $campo['e_mail'];
            }

            $sql = "SELECT * FROM Datos_Cotizacion WHERE id_cotizacion='$id_cotizacion'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $datos_cliente = $campo['datos_cliente'];
                $datos_vendedor = $campo['datos_vendedor'];
                $datos_vendedor2 = $campo['datos_vendedor2'];
            }



            $sql = "SELECT `partida` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                
            }

            $sql = "SELECT * FROM Cotizaciones WHERE `id_cotizacion` = '$id_cotizacion'";
            $resultado = query($sql, $conexion);
            while ($campo = mysql_fetch_array($resultado)) {
                $t_entrega = $campo['t_entrega'];
                $c_pago = $campo['c_pago'];
                $vigencia = $campo['vigencia'];
                $descuento = $campo['descuento'];
                $no_partidas = $campo['no_partidas'];
                $proyecto = $campo['proyecto'];
                $divisaa = $campo['divisa'];
            }
            $descuento2 = $descuento * 100;

            $_SESSION['no_partidas'] = $no_partidas;

/////////////////COMIENZA LA PAGINA WEB//////////////+
            ?>
            <div id="imprimeme">
                
                <head>
                    <title>Formulario de cotización</title>
                    <meta name="keywords" content="" />
                    <meta name="description" content="" />
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="language" content="en" />

                </head>

                <body class="h7"> <br><br><br>

                    <div id="page">
                        <div align="center">
                            <table border=0 cellspacing="2px" width="90%">
                            <tr >

                                <td height="33.3%" width="33.3%" id="bordet">
                                    <div align="center" class="h8"> <img align="center" src="images/logoe1.png" width="250"><br><br> <div align="left">Av. Ju&aacute;rez #9 Int. 1, San Mateo Ixtacalco 
                                                                                                                          Cuautitl&aacute;n Izcalli, Edo. de
                                                                                                                          M&eacute;xico C.P. 54713. tel. (55)5870 1510/
                                                                                                                          (55)2620 2313 </div> 
                                    </div>
                                </td>



                            <form method="POST" action="editar_cotizacion2.php">

                                <td height="33.3%" width="33.3%" id="bordet">
                                    <div align="center"><br>
                                        <textarea class="cajaa" align="Center" name="datos_cliente" rows="13" cols="30"><?php 
                                        echo $datos_cliente; ?> </textarea>
                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                    
                                    </div>
                                </td>
                                <td height="33.3%" width="33.3%" id="bordet">
                                    <table>
                                                        
                                            <tr><td width="50%" align=right>
                                                    </td><td align=center width="50px"><input class="caja" type="text" name="id_cotizacion" disabled value="<?php echo $id_cotizacion; ?>" ></td></tr>

                                            <tr><td width="50%" align=right>
                                                    Fecha: </td><td align=center width="50px"><input class="caja" type="text" name="fecha" disabled value="<?php echo $fecha; ?>"> </td></tr>
                                            
                                            <tr><td width="50%" align=right>
                                                    Partidas: </td><td align=center width="50px"><input class="caja" type="text" name="no_partidas1" disabled value="<?php echo $no_partidas; ?>"></td></tr>

                                        </table>
                                </td>
                                
                                  

                                </tr>

                        </table>
                            <br><br>

                            </div>
                        <table width="950" BGCOLOR="#000000" >
                    <tr><td><div class="h7" align="left" style="font-size: 15px; color: white;">NOMBRE DEL PROYECTO: 
                                <input type="text" placeholder="Proyecto" name="proyecto" value="<?php echo $proyecto; ?>" class="caja"></div> </td></tr><br></table>

                    <div align="center">
                        <table   border="4px" width="950" cellspacing="1px">

                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th width="10%">CAT&Aacute;LOGO</th>
                                    <th width="40%">CONCEPTO</th>                                    
                                    <th width="10%">U</th>
                                    <th width="10%">Cantidad</th>                                    
                                    <th width="10%">PRECIO UNITARIO</th>
                                    <th width="10%">PRECIO TOTAL</th></tr></>                                    
                                </tr>
                            </thead>

                            <?php
                            $subtotal = 0;
                            $nom_partida = 0;
//Obtener "tabla Partidas"
                            $sql = "SELECT `partida`,`cantidad`,`unidad`,`catalogo`,`descripcion`,`precio_uni`,`precio_total` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
                            $resultado = query($sql, $conexion);
                            while ($campo = mysql_fetch_array($resultado)) {
                                $precio_uni = $campo['precio_uni'];
                                $precio_total = $campo['precio_total'];
                                $precio_uni = number_format($precio_uni, 2);
                                $precio_total = number_format($precio_total, 2);

                                echo
                                "<tr>" .
                                "<td align='center' id='texto1'>" . $campo['partida'] . "</td>" .
                                "<td align='center' id='texto1'>" . $campo['catalogo'] . "</td>" .
                                "<td align='justify' id='texto1'>" . $campo['descripcion'] . "</td>" .
                                "<td align='center' id='texto1'>" . $campo['unidad'] . "</td>";

                                if ($campo['cantidad'] == 0) {
                                    echo
                                    "<td align='center' id='texto1'> </td>";
                                } else {
                                    echo
                                    "<td align='center' id='texto1'>" . $campo['cantidad'] . "</td>";
                                }                     

                                if ($campo['precio_uni'] == 0) {
                                    echo
                                    "<td id='aligder'> </td>" .
                                    "<td id='aligder'> </td>";
                                } else {
                                    echo
                                    "<td id='aligder'>" . $precio_uni . "</td>" .
                                    "<td id='aligder'>" . $precio_total . "</td>";
                                }
                                "</tr>";
                                $subtotal = $subtotal + $campo['precio_total'];
                                $nom_partida = $nom_partida + 1;
                            }

                            $subtotal1 = $subtotal * $descuento;
                            $subtotal2 = $subtotal - $subtotal1;
                            $iva = $subtotal2 * 0.16;
                            $total = $subtotal2 + $iva;

                            $_SESSION['subtotal'] = $subtotal2;
                            $_SESSION['total'] = $total;
                            $_SESSION['iva'] = $iva;


                            $iva = number_format($iva, 2);
                            $total = number_format($total, 2);
                            $subtotal = number_format($subtotal, 2);
                            $subtotal2 = number_format($subtotal2, 2);
                            ?>

                            <tr>
                                <td style="border: hidden" colspan="5" >
                                    <table border="3px" width="500px" id="margen">
                                        <thead>
                                            <tr>
                                                <th width="20%" align="center" colspan="2" id="sin_borde">Notas</th>						
                                            </tr>
                                            <tr>
                                                <th width="20%" align="center">No de nota</th>
                                                <th width="80%" align="center">Descripción</th>
                                            </tr>
                                        </thead>

<?php
//Obtener Datos de la empresa a cotizar "tabla Partidas"
$sql = "SELECT `no_nota`,`descripcion` FROM `Notas` WHERE `id_cotizacion` = '$id_cotizacion'";
$resultado = query($sql, $conexion);
$i = 1;
while ($campo = mysql_fetch_array($resultado)) {
    echo
    "<tr>" .
    "<td align='center' class='lenotas' style='color:black;'>" . $i . "</td>" .
    "<td align='justify' class='lenotas' style='color:black;' >" . $campo['descripcion'] . "</td>" .
    "</tr>";
    $i++;
}
?>


                                    </table></div>

                                </td>

                                
                                </div>

                            </tr>
                        </table>
                        
                        
                        
                        <div align='right'>
                        <table>
                            <tr>
                            <td>

                                    <br>

                                    
                                    <div class="h7" style="font-size: 15px;"> <?php echo 'Subtotal'; ?></div> <HR width=100% align="left">
<?php if ($descuento > 0) { ?>
                                        <div class="h7" style="font-size: 15px;"> <?php echo 'Descuento'; ?></div> <HR width=100% align="left">
                                        <div class="h7" style="font-size: 15px;"> <?php echo 'Subt. c/desc.'; ?></div> <HR width=100% align="left">
<?php } ?>
                                    <div class="h7" style="font-size: 15px;"> <?php echo 'I.V.A.'; ?></div> <HR width=100% align="left">
                                    <div class="h7" style="font-size: 15px;"> <?php echo 'Total'; ?></div> 
                                </td>


                                <td>
                                    <br><div align="right">   
                                        

                                        <div class="h7" style="font-size: 15px;"> <?php echo $subtotal; ?></div> <HR width=100% align="left">
<?php if ($descuento > 0) { ?>
                                            <div class="h7" style="font-size: 15px;"> <?php echo "$descuento2 %"; ?></div> <HR width=100% align="left">
                                            <div class="h7" style="font-size: 15px;"> <?php echo $subtotal2; ?></div> <HR width=100% align="left">
<?php } ?>
                                        <div class="h7" style="font-size: 15px;"> <?php echo $iva; ?></div><HR width=100% align="right">
                                        <div class="h7" style="font-size: 15px;"> <?php echo $total; ?></div>
                                </td>
                                </tr>
                        </table>
                            </div>
                        
                        
                        
                    </div>
                </div>
                <table border=0 cellspacing="2px">
                    
                <tr>
                    <td width="50%" align=left class="h8">
                        PRECIOS EN <select id="select1" name="divisa" >
                            <option  value="M.N." name="mn"<?php if($divisaa=="M.N."){echo "selected";}?>  >M.N</option>
                                        <option value="Dolar" name="dolar" <?php if($divisaa=="Dolar"){echo "selected";}?>   >Dolares</option>
                                    </select> 
                        TIPO DE CAMBIO OFICIAL DIA DE FACTURACION<br>                                                    
                                        
                        VIGENCIA EN D&Iacute;AS: <input class="caja" type="text" placeholder="No vigencia en días" name="vigencia" value="<?php echo $vigencia; ?>"><br>
                                        
                        TIEMPO DE ENTREGA: <input class="caja" type="text" placeholder="Tiempo de entrega" name="t_entrega"  value="<?php echo $t_entrega; ?>" align="center"><br>
                                        
                        L.A.B. AREA METROPOLITANA<br>
                                        
                        CONDICIONES DE PAGO: <input class="caja" type="text" placeholder="Condiciones de pago" name="c_pago"  value="<?php echo $c_pago; ?>" align="center">
                                        <br><br>                                        
                        <table border="3px" width="400px" height="70px">                                        
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                    
                        <br>                        
                                
                        <div align="center">
                            <input  type="text" class="cajota"  name="datos_vendedor" value="<?php echo "$datos_vendedor"; ?>"><br> 
                            Specialist Specifier
                            
                        </div><br>                      
                        
                
                </td>
                    <td>
                        <div align='center'><textarea  type="text" class="cajota"  name="datos_vendedor2" rows="1" cols="28"><?php echo $datos_vendedor2; ?></textarea></div>
                    </td>
                
                 </tr>               
                                

                            
                </table>
                    </div><br><br>
<?php if ($cancelar == 0) { ?>
                        <div align="center"><input type="submit" value="Crear" id="botonp"></div>
<?php } else { ?>

                        <div align="center"><input type="submit" value="Aceptar" id="botonp"></div></a>

                    <?php } ?>


                    </form>
            </div>
            </body>
        </div>
</html>

</div>