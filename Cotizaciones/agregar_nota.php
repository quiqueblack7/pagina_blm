
<?php
//Capturamos el usuario autenticado
session_start();
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$con = conectar();
if (isset($_GET['nota'])) {
    $nota = $_GET['nota'];
    $sql = "SELECT * FROM Notas_Predef WHERE id_nota = '$nota'";
    $resultado = query($sql, $con);
    $campo = mysql_fetch_array($resultado);
    $desplegar = $campo["nota"];
} else {
    $nota = 0;
}
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
    <div id="page">
        <div id="header">
            <h1>Bestlight M&eacute;xico S.A. de C.V.</h1>
        </div></div> 

    <script>
        function nota() {
            var valor = document.getElementById("nota").value;
            if (valor == 0)
            {
                alert("Selecciona una nota");
            }
            else
            {
                var dir = "agregar_nota.php?nota=";
                var res = dir.concat(valor);
                window.location = res;
            }
        }
    </script>

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

    <div align="center">
        <h2 style="color:#5A8D9A;">Agregar notas<br><br></h2>
        <select style="background-color: white" id="nota" name="no_nota" required>
            <option value="0" style="background-color: #DADADA" disabled selected>Seleccione nota predeterminada</option>
            <option value="5" >Nota 1 (Nota libre)</option>
            <option value="1" >Nota 2 (que incluye)</option>
            <option value="2" >Nota 3 (flete)</option>
            <option value="3" >Nota 4 (garantia)</option>
            <option value="4" >Nota 5 (tiempo de entrega)</option>

        </select>
        <button onclick="nota()" id="botonp">Siguiente</button> <a href="notas.php"><button id="botonp">Atras</button></a>

        <br>

<?php if (isset($_GET['nota'])) { ?>

            <br>
            <form action="notas2.php" method="POST">
                <table width="500"  border="0px">
                    <tr>
                        <td width="80%">




                            <div id="textBox" contenteditable="true" name="descripcion"></div>


                            <textarea rows=5 cols=60 name="descripcion" required><?php if (isset($_GET['nota'])) {
        echo $desplegar;
    } ?></textarea></td>

                    </tr>
                </table>

                <input type="submit" value="Aceptar" id="botonp" >

            </form>

<?php } ?>

    </div>