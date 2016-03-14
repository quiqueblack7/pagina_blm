<!DOCTYPE html >
<html>

    <head>
        <title>Consecutivo de cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="tabla_notas.css" rel="stylesheet" type="text/css" />
    </head>




    <script>
        function Cancelar() {
            var r = confirm("Esta seguro que desea cancelar la cotizacion?");
            if (r == true) {
                location.href = "cancelar.php";
            }
        }

        function Eliminar(nota) {
            var r = confirm("Esta seguro que desea eliminar esta nota?");
            if (r == true) {
                var dir = "eliminar_nota.php?id_nota=";
                var union = dir.concat(nota);
                window.location = union;
            }
        }
    </script>

    <body onload="initDoc();">
        <div id="page">
            <div id="header">
                <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>
            </div>
            <?php
            //Capturamos el usuario autenticado
            session_start();
            //incluimos el archivo con las funciones
            include ("funciones_mysql.php");

            //Funcion que conecta la base de datos
            $con = conectar();


            if (isset($_SESSION['cancelar'])) {
                $cancelar = $_SESSION['cancelar'];
            } else {
                $cancelar = 0;
            }
            ?>
            <br><br><br>

            <div id="modificar">

                <div id="titulo2" style="margin-left: -30px; text-align: center;">Generador de notas para la cotizaci&oacute;n</div>

                <div class="tabla_notas" >
                    <table >

                        <tr>
                            <td width="20%">No de nota</td>
                            <td width="60%">Descripción</td>
                            <td width="20%">Utilidades</td>
                        </tr>



                        <?php
                        if (!isset($_SESSION['usuarioc'])) {
                            header('Location: index.php');
                        }
                        $id_cotizacion = $_SESSION['cotizacion'];



                        header('Content-Type: text/html; charset=UTF-8');



                        $siguiente = 1;
//Obtener Datos de las notas "tabla notas"
                        $sql = "SELECT * FROM Notas WHERE id_cotizacion='$id_cotizacion'";
                        $resultado = query($sql, $con);
                        while ($campo = mysql_fetch_array($resultado)) {
                            echo
                            "<tr>" .
                            "<td align='center'  >" . $siguiente . "</td>" .
                            "<td>" . $campo['descripcion'] . "</td>" .
                            "<td align='right'> <a href='editar_nota.php?no_nota=" . $campo['no_nota'] . "' style='margin:0 10px 0 -10px;' ><img src='images/edit.png'></a> <img src='images/delete.png' onclick='Eliminar(" . $campo['no_nota'] . ")'>  </td>" .
                            "</tr>";
                            $siguiente++;
                        }
                        ?>
                    </table>
                </div>
                <br>


                <table>
                    <tr><td>
                            <a href="partidas.php"><input type="button" value="Atras" id="botonp" ></a>
                            <a href="agregar_nota.php"><input type="button" value="Agregar Nota" id="botonp" ></a>

                            </body>
                        </td>

                        <td>
                            <?php if ($siguiente > 0) { ?>
                                <?php if ($cancelar == 0) { ?>
                                    <a href="descuentos.php"><input type="button" value="Siguiente" id="botonp"></a>
                                <?php } else { ?>
                                    <a href="descuentos.php"><input type="button" value="Siguiente" id="botonp"></a>
                                <?php }
                            }
                            ?>
                        </td>


                    </tr>
                </table>
                <div id="subir2">
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
