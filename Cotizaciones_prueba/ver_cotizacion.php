<link href="style.css" rel="stylesheet" type="text/css" />
<link href="hoja_blanca.css" rel="stylesheet" type="text/css" />
<div align="center">
    <div id="hoja">
        <?php
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header('Location: log_in.php');
        }
        $id_usuario = $_SESSION['usuario'];

//incluimos el archivo con las funciones
        include ("funciones_mysql.php");

//Funcion que conecta la base de datos
        $conexion = conectar();

        $id_cotizacion = $_GET['id_cotizacion'];

        $sql = "SELECT* FROM Cotizaciones WHERE id_cotizacion = '$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $fecha = $campo['fecha'];
        $id_num_cliente = $campo['id_num_cliente'];
        $id_usuario = $campo['id_usuario'];
        $vigencia = $campo['vigencia'];
        $no_partidas = $campo['no_partidas'];
        $divisa = $campo['divisa'];
        $subtotal = $campo['subtotal'];
        $iva = $campo['iva'];
        $total = $campo['total'];
        $t_entrega = $campo['t_entrega'];
        $c_pago = $campo['c_pago'];
        $descuento = $campo['descuento'];
        $descuento2 = $descuento * 100;
        $sub = $subtotal;
        $subtotal1 = $subtotal * $descuento;
        $subtotal2 = $subtotal - $subtotal1;
        $proyecto = $campo['proyecto'];

        $sql = "SELECT * FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $id_direccion = $campo['id_direccion'];

        $sql = "SELECT * FROM Datos_Cotizacion WHERE `id_cotizacion`='$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $cliente = $campo['datos_cliente'];
        $contacto = $campo['datos_contacto'];
        $vendedor = $campo['datos_vendedor'];



        $sql = "SELECT * FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $id_contacto = $campo['id_contacto'];
        $empresa = $campo['empresa'];



        $sql = "SELECT nombre_c, departamento, telefono1, telefono2, e_mail_c FROM Contacto WHERE id_contacto='$id_contacto'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre_c = $campo['nombre_c'];
        $departamento = $campo['departamento'];
        $telefono1 = $campo['telefono1'];
        $telefono2 = $campo['telefono2'];
        $e_mail_c = $campo['e_mail_c'];


        $sql = "SELECT * FROM Usuarios WHERE id_usuario='$id_usuario'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre = $campo['nombre'];
        $apellido_p = $campo['apellido_p'];
        $apellido_m = $campo['apellido_m'];
        $e_mail = $campo['e_mail'];
        $telefonoo1 = $campo['telefono1'];
        $telefonoo2 = $campo['telefono2'];


        $nombre = "$nombre " . "$apellido_p " . "$apellido_m";


        $sql = "SELECT * FROM Direcciones WHERE id_direccion=$id_direccion";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $calle = $campo['calle'];
        $num_int = $campo['num_int'];
        $num_ext = $campo['num_ext'];
        $municipio = $campo['municipio'];
        $estado = $campo['estado'];
        $cp = $campo['cp'];

//INICIA LA PAGINA WEB
        ?>
        <div id="imprimeme">
            <head>
                <title>Ingrese el nombre del documento</title>
                <meta name="keywords" content="" />
                <meta name="description" content="" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="language" content="en" />
                <link href="style.css" rel="stylesheet" type="text/css" />

                <script>
                    function imprimir() {

                        var objeto = document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
                        var ventana = window.open('', '_blank');  //abrimos una ventana vacía nueva
                        ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
                        ventana.document.close();  //cerramos el documento
                        ventana.print();  //imprimimos la ventana
                        ventana.close();  //cerramos la ventana
                    }
                </script>



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



                            

                                <td height="33.3%" width="33.3%" id="bordet">
                                    <div align="center"><br>
                                        <textarea class="cajaa" align="Center" name="datos_cliente" rows="13" cols="30"><?php 
                                        echo "CLIENTE: $empresa \n\nCONTACTO: " . "$nombre_c \n\n" . "DIRECCION: $calle " . "$num_int," .
                                        " $num_ext, " . "$colonia, " . "C.P. $cp" . ",$municipio " . "$estado \n\nCORREO-E: " . "$e_mail_c \n\nTELEFONOS: "
                                        . "$telefono1, " . "$telefono2"; ?> </textarea>
                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                    
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
                        
                       
                        

                    </div>

                    <table width="950" BGCOLOR="#000000" >
                    <tr><td><div class="h7" align="left" style="font-size: 15px; color: white;">NOMBRE DEL PROYECTO: 
                            <?php echo $proyecto;?></div> </td></tr><br></table>

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
                        PRECIOS EN <?php echo $divisa; ?>     TIPO DE CAMBIO OFICIAL DIA DE FACTURACION<br>                                                    
                                        
                        VIGENCIA EN D&Iacute;AS: <?php echo $vigencia; ?><br>
                                        
                        TIEMPO DE ENTREGA: <?php echo $t_entrega; ?><br>
                                        
                        L.A.B. AREA METROPOLITANA<br>
                                        
                        CONDICIONES DE PAGO: <?php echo $c_pago; ?>
                                        <br><br>                                        
                        <div align="center">
                                        <table border="3px" width="400px" height="70px">                                        
                            <tr>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                    
                        <br>                        
                                
                        <div align="center">
                            <?php echo "$nombre"; ?><br> 
                            Specialist Specifier
                            
                        </div><br>                      
                        
                
                </td>
                    <td>
                        <div align='center'><?php echo "$e_mail<br>" . " $telefonoo1<br>" . " $telefonoo2<br>"; ?></div>
                    </td>
                
                 </tr>               
                                

                            
                </table>
        </div>
    </div>

                                    <div align="center">
                                        <a href="javascript:history.back()">  <input type="button" value="Regresar" class="formu-button6"></a>
                                        <button onclick="imprimir();" class="formu-button6">Imprimir</button>
                                    </div>

                                    </body>

                                    </html>

                                    </div>