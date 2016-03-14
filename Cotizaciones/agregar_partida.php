<?php
header('Content-Type: text/html; charset=UTF-8');
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();
?>

<!DOCTYPE html >
<html>

    <head>
        <title>Consecutivo de cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />   
    </head>

    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
            ],
            toolbar1: "bold italic underline strikethrough | forecolor ",
            menubar: false,
            toolbar_items_size: 'small',
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });</script>


    <script>
        function datos1() {
            var partida = document.getElementById("partida").value;
            var catalogo = document.getElementById("catalogo").value;
            var catalogo2 = encodeURIComponent(catalogo);
            var dir = "agregar_partida.php?partida=";
            var dir2 = "&catalogo=";
            var union = dir.concat(partida);
            var union2 = dir2.concat(catalogo2);
            var res = union.concat(union2);
            window.location = res;
        }




        function datos2() {
            var partida = document.getElementById("partida").value;
            var catalogo = document.getElementById("catalogo").value;
            var descripcion = document.getElementById("txt").value;
            var unidad = document.getElementById("unidad").value;
            var cantidad = document.getElementById("cantidad").value;
            var precio = document.getElementById("precio").value;
            var dir = "agregar_partida2.php?partida=";
            var dir2 = "&catalogo=";
            var dir3 = "&descripcion=";
            var dir4 = "&unidad=";
            var dir5 = "&cantidad=";
            var dir6 = "&precio=";
            var union = dir.concat(partida);
            var union2 = dir2.concat(catalogo);
            var union3 = dir3.concat(descripcion);
            var union4 = dir4.concat(unidad);
            var union5 = dir5.concat(cantidad);
            var union6 = dir6.concat(precio);

            var res = union.concat(union2);
            var res2 = union3.concat(union4);
            var res3 = union5.concat(union6);

            var res4 = res.concat(res2);
            var res5 = res4.concat(res3);
            window.location = res5;
        }
    </script>

<?php
$formu = 0;
$unidad = "";
if (isset($_GET['partida'])) {
    $partida = $_GET['partida'];
} else {
    $partida = '';
}

if (isset($_GET['catalogo'])) {
    $catalogo = $_GET['catalogo'];
    $sql = "SELECT * FROM Catalogo where id_catalogo='$catalogo' ";
    $resultado = query($sql, $conexion);
    $campo = mysql_fetch_array($resultado);
    $descripcion = $campo['descripcion'];
    $unidad = $campo['unidad'];
    $formu = 1;
    if ($descripcion == "") {
        $descripcion = "No se ha encontrado la descripcion para el catalogo solicitado";
    }
} else {
    $catalogo = "";
    $descripcion = "";
}
?>


    <body>
        <div id="page">
            <div id="header">
                <h1>Best Light México SA de CV</h1>
            </div> <br><br><br>


<?php
if ($formu == 1) {
    echo '<form action="partidas2.php" method="POST">';
}
?>



            <div id="grande">
                <tr><td>
<?php if ($formu == 0 || $formu == 1) { ?>
                            <div id="izq">Ingrese la partida:</div> <input type="text" class="cajita" name="partida" placeholder="Partida"  size="15" id="partida" value="<?php echo $partida;?>"><br><br><br>
                            <div id="izq">Ingrese el cat&aacute;logo:</div><input type="text" class="cajita" name="catalogo" placeholder="Catálogo"  size="60" id="catalogo" value="<?php echo $catalogo; ?>"> <button onclick="datos1()" id="botonp">Siguiente</button><br><br><br>
<?php } ?>
                        <?php if ($formu == 1) { ?>
                            <div id="izq">Ingrese la descripción:</div><div id="der"><textarea rows="3" cols="35" name="descripcion" placeholder="Descripción" id="txt" required ><?php echo $descripcion; ?></textarea></div><br><br><br><br><br><br><br><br><br><br><br><br>

                            <!-- No hay required -->

                            <div id="izq">Unidad:</div><select style="background-color: white;" class="cajita" name="unidad" id="unidad">
                                <option style="background-color: #DADADA" disabled selected>Unidad</option>
                                <option value="PZA." <?php if ($unidad == 'PZA.') {
                            echo 'selected';
                        } ?> >PZA.</option>
                                <option name="JGO." <?php if ($unidad == 'JGO.') {
                            echo 'selected';
                        } ?>>JGO.</option>
                                <option value="METRO" <?php if ($unidad == 'METRO') {
                            echo 'selected';
                        } ?>>METRO</option>
                                <option name="CJTO." <?php if ($unidad == 'CJTO.') {
                            echo 'selected';
                        } ?>>CJTO.</option>
                                <option name="S/N" <?php if ($unidad == 'S/N') {
                            echo 'selected';
                        } ?>>S/N</option>
                                <option name="N/A" <?php if ($unidad == 'N/A') {
                            echo 'selected';
                        } ?>>N/A</option>
                                <option name="vacio" <?php if ($unidad == '') {
                            echo 'selected';
                        } ?>></option>
                            </select><br><br><br>


                            <!-- No hay required -->

                            <div id="izq">Cantidad:</div> <input type="number" class="cajita" name="cantidad" placeholder="Cantidad" id="cantidad"  min="0"><br><br><br>

                            <!-- No hay required -->

                            <div id="izq">Precio unitario:</div><input type="number" class="cajita" name="precio_uni" placeholder="Precio unitario" id="precio"  size="15" min="0" step="any"><br><br><br>
							
							<div id="izq">Descuento (porcentaje):</div><input type="number" class="cajita float_left" name="descuento" placeholder="Descuento" id="precio"  size="15" min="0" step="any"><div class="color">%</div><br><br><br><br>
                        </td></tr>
                </div>


				<div id="botonces_centrados">
                <div align="right"><button id="botonp" align="right" >Aceptar</button><br></div>

    <?php
    echo '</form>';
}
?>


            <div align="left" <?php if ($formu == 1) { ?>style="margin-top:-45px;" <?php } ?>><a href="partidas.php"><input type="button" value="Atras" id="botonp"></a></div></div>


