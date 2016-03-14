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

        $sql = "SELECT `id_direccion` FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $id_direccion = $campo['id_direccion'];

        $sql = "SELECT * FROM Datos_Cotizacion WHERE `id_cotizacion`='$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $cliente = $campo['datos_cliente'];
        $contacto = $campo['datos_contacto'];
        $vendedor = $campo['datos_vendedor'];



        $sql = "SELECT id_contacto, empresa FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
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


        $sql = "SELECT nombre, apellido_p, apellido_m, e_mail FROM Usuarios WHERE id_usuario='$id_usuario'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre = $campo['nombre'];
        $apellido_p = $campo['apellido_p'];
        $apellido_m = $campo['apellido_m'];
        $e_mail = $campo['e_mail'];


        $nombre = "$nombre " . "$apellido_p " . "$apellido_m";


        $sql = "SELECT `calle`,`num_int`,`num_ext`,`municipio`,`estado`,`cp` FROM Direcciones WHERE id_direccion=$id_direccion";
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
                <title>Generador de cotizaci&oacute;nes</title>
                <meta name="keywords" content="" />
                <meta name="description" content="" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="language" content="en" />
                <link href="style.css" rel="stylesheet" type="text/css" />
				<link href="hoja_blanca.css" rel="stylesheet" type="text/css" />

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

            <body id="bodier" class="h7" style="color:black;"> <br><br><br>
                <div id="page">
                    <div align="center">
                        <table border=0 cellspacing="2px" width="90%">
                            <tr >

                                <td height="33.3%" width="33.3%" id="bordet">
                                    <div align="center"> <img align="center" src="images/logoe1.png" width="120" height="100"></div>
                                </td>




                                <td height="33.3%" width="33.3%" id="bordet">
                                    <div align="center">
                                        <table>

                                            <tr><td width="50%" align=right class="h7">
                                                    No. de Cotizaci&oacute;n:</td><td align=center width="50px" class="h7"><?php echo $id_cotizacion; ?></td></tr>

                                            <tr><td width="50%" align=right class="h7">	      
                                                    Fecha: </td><td align=center width="50px"><?php echo $fecha; ?> </td></tr>

                                            <tr><td width="50%" align=right class="h7">
                                                    Vigencia en Días: </td><td align=center width="50px"><?php echo $vigencia; ?>
                                                </td></tr>

                                            <tr><td width="50%" align=right class="h7">
                                                    Partidas: </td><td align=center width="50px"><?php echo $no_partidas; ?></td></tr>

                                        </table>
                                    </div>
                                </td>
                            </tr>

                            <tr>

                                <td id="bordet" valign="top" class="h7"><div align="center" >
                                        <br><br> <h3>Artefactos Lumínicos S.A. de C.V. </h3>		
                                        <h5 class="h7">Av. Juárez No. 9-2, Col. San Mateo Ixtacalco,
                                            <br>Cuautitlán Izcalli, Estado de México, C.P. 54713
                                            <br>ventas@artefactosluminicos.com.mx
                                            <br>www.artefactosluminicos.com.mx </h5></div>
                                </td>
                                <td id="bordet"  align="left" class="h7"><br><h3><div class="h7">Condiciones de venta</div></h3><h5 class="h7">
                                        *Precios sujetos a cambio sin previo aviso.
                                        <br>*Cotizaciones confirmadas en dolares hacer pago en dolares a la cuenta 451244981 
                                        CLABE 012180004512449814 de Bancomer.
                                        <br>*Toda devolución autorizada causará un cargo del 35%.
                                        <br>*No se aceptan cancelaciones.
                                        <br>*La empresa se reserva el derecho de hacer cargos por
                                        almacenaje 72 hrs. posteriores al aviso de mercancia preparada.
                                        <br>*Cualquier modificación de este documento lo invalidará.</h5>
                                </td>

                            </tr>
                        </table>
                        <br><br>
                        <table border=0 cellspacing="2px" width="90%">
                            <tr>
                                <td id="bordet" valign="top" class="h7">              
                                    <div align="center" class="h7"><div  class="h7" >Datos del cliente</div> 
                                        <div id="datos_coti" >   <?php echo $cliente; ?>  </div>
                                    </div><br>
                                </td>

                                <td id="bordet" valign="top" class="h7">
                                    <div align="center"><div class="h7"  >Datos de contacto</div> 
                                        <div id="datos_coti" ><?php echo $contacto; ?>  </div></div><br>
                                </td>
                                <td id="bordet"  valign="top" class="h7">
                                    <div align="center"><div class="h7" >Datos del vendedor</div>
                                        <div id="datos_coti"><?php echo $vendedor; ?> </div> </div><br>
                                </td>

                            </tr>

                        </table>

                    </div>

                    <div class="h7" style="font-size: 15px" align="center">PONEMOS A SU AMABLE CONSIDERACIÓN EL SIGUIENTE PRESUPUESTO</div> <br>

                    <div align="center">
                        <table  border="4px" width="950" cellspacing="0" class="h7">

                            <thead>
                                <tr>
                                    <th width="7%">Partida</th>
                                    <th width="7%">Cantidad</th>
                                    <th width="7%">Unidad</th>
                                    <th width="7%">Catálogo</th>
                                    <th width="58%">Descripción</th>
                                    <th width="7%">Precio unitario</th>
                                    <th width="7%">Precio total</th>
                                </tr>
                            </thead>

                            <h5><?php
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
                                    "<td align='center' id='texto1'>" . $campo['partida'] . "</td>";

                                    if ($campo['cantidad'] == 0) {
                                        echo
                                        "<td align='center' id='texto1'> </td>";
                                    } else {
                                        echo
                                        "<td align='center' id='texto1'>" . $campo['cantidad'] . "</td>";
                                    }

                                    echo
                                    "<td align='center' id='texto1'>" . $campo['unidad'] . "</td>" .
                                    "<td align='center' id='texto1'>" . $campo['catalogo'] . "</td>" .
                                    "<td align='justify' id='texto1'>" . $campo['descripcion'] . "</td>";

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
                                }
                                ?>



                                <tr>
                                    <td style="border: hidden" colspan="5" ><br><b5>
                                    <table border="3px" width="500px" id="margen" class="h7">
                                        <thead>
                                            <tr>
                                                <th width="20%" align="center" colspan="2" id="sin_borde"  >Notas<br></th>		
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
    "<td align='center' id='texto1' class='lenotas' style='text-align: center; color: black;'>" . $i . "</td>" .
    "<td align='center' id='texto1' class='lenotas' style='text-align: center; color: black;'>" . $campo['descripcion'] . "</td>" .
    "</tr>";
    $i++;
}
?>
                                    </table>

                                    </td>

                                    <td>
                                        <br>
                                        <input id="noborde" name="subtotal" style='text-align: right; color: black;'  type="text" value="DIVISA" disabled ><br><HR width=100% align="left"><br>
                                        <input id="noborde" name="subtotal" style='text-align: right; color: black;'  type="text" value="SUBTOTAL" disabled><br><HR width=100% align="left"><br>
                                        <?php if ($descuento > 0) { ?>
                                            <input id="noborde" name="subtotal" style='text-align: right; color: black;'  type="text" value="DESCUENTO" disabled><br><HR width=100% align="left"><br>
                                            <input id="noborde" name="subtotal" style='text-align: right; color: black;'  type="text" value="SUBTOTAL CON DESC" disabled><br><HR width=100% align="left"><br>
                                        <?php } ?>
                                        <input id="noborde" name="subtotal" style='text-align: right; color: black;'  type="text" value="I.V.A." disabled><br><HR width=100% align="left"><br>
                                        <input id="noborde" name="subtotal" style='text-align: right; color: black;'  type="text" value="TOTAL" disabled>
                                    </td>


                                    <td>
                                        <br>

                                        <?php
                                        $iva = number_format($iva, 2);
                                        $total = number_format($total, 2);
                                        $sub = number_format($sub, 2);
                                        $subtotal2 = number_format($subtotal2, 2);
                                        ?>

                                        <input id="noborde" name="subtotal" style="text-align: right; color: black;" type="text" value="<?php if ($divisa == 'Dolar') {
                                            echo DOLAR;
                                        } else echo 'M.N.'; ?>" disabled><br><HR width=100% align="left"><br>

                                        <input id="noborde" style="text-align: right; color: black;" name="subtotal" type="text" value="<?php echo $sub; ?>" disabled> <br><HR width=100% align="left"><br>
                                        <?php if ($descuento > 0) { ?>
                                            <input id="noborde" style="text-align: right; color: black;" name="subtotal" type="text" value="<?php echo "$descuento2 %"; ?>" disabled> <br><HR width=100% align="left"><br>
                                            <input id="noborde" style="text-align: right; color: black;" name="subtotal" type="text" value="<?php echo $subtotal2; ?>" disabled> <br><HR width=100% align="left"><br>
                                        <?php } ?>
                                        <input id="noborde" style="text-align: right; color: black;" name="iva" type="text" value="<?php echo $iva; ?>" disabled><br><HR width=100% align="left"><br>
                                        <input id="noborde" style="text-align: right; color: black;" name="total" type="text" value="<?php echo $total; ?>" disabled>
                                    </td>


                                    </tr>
                                    </table></div>



                                    <br><br><br>
                                    <table border=1 cellspacing="2px">
                                        <tr>
                                            <td><h5 class="h7">
                                                    Condiciones de entrega<br>
                                                    *El tiempo de entrega corre a partir de recibir su pedido original firmado<br> haciendo referencia a este número de cotización y de confirmar el 			anticipó<br> correspondiente en nuestra cuenta.<br>
                                                    *Para embalajes especiales considerar cargos extras.<br>
                                                    *Los fletes foraneos corren por cuenta y riesgo del cliente.<br>
                                                    *En pedidos mínimo de $12,500.00 L.A.B. D.F. y zona metropolitana, excepto postes.<br>
                                                    *No se liberan materiales sin el pago total de la mercancia.
                                                </h5></td>

                                            <td width="210px" class="h7">
                                                <h3 align="center">Tiempo de entrega</h3><br><br>
                                                <div align="center" valign="top"> <?php echo $t_entrega; ?></div>
                                            </td>

                                            <td width="210px" class="h7">
                                                <h3 align="center">Condiciones de pago</h3><br><br>
                                                <div align="center" valign="top">
<?php echo $c_pago; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    </div><br><br>
                                    </div>
									
                                    </div>
                                    <div align="center">
										
                                        <a href="javascript:history.back()">  <input type="button" value="Regresar" class="formu-button6"></a>
                                        <button onclick="imprimir();" class="formu-button6">Imprimir</button>
										
                                    </div>
									<?php
									echo $empresa;
									echo "<a href='orden_venta.php?id_cotizacion=".$id_cotizacion."' class='botoncirri'>Generar orden de venta</a>";
									?>

                                    </body>

                                    </html>

                                    </div>