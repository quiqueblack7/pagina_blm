<?php
session_start();
if (isset($_SESSION['cancelar'])) {
    $cancelar = $_SESSION['cancelar'];
} else {
    $cancelar = 0;
}

?>
<html>
    <head>
        <title>Consecutivo de Cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <div id="header">
            <div align="center"><h1 style="text-align: center;">Bestlight M&eacute;xico S.A. de C.V.</h1></div>
        </div> 

<?php
echo"<script>
            
                var r = confirm('Desea agregar un descuento especial a la cotizacion?');
               if (r == true) {}
               else {";
if ($cancelar == 0) {
    echo "location.href='form_cotizacion.php';";
} else {
    echo "location.href='editar_form_cotizacion.php';";
}

echo" }</script>";
?>

        <?php
        //incluimos el archivo con las funciones
        include ("funciones_mysql.php");

        //Capturamos el usuario autenticado
        session_start();

        //Funcion que conecta la base de datos
        $con = conectar();


        if (isset($_SESSION['cancelar'])) {
            $cancelar = $_SESSION['cancelar'];
        } else {
            $cancelar = 0;
        }
        ?>

        <div style="margin-top: 70px;" align="center">
            <form action="descuentos2.php" method="POST">  
                <div style="font-size: 16px;">
                    Ingrese el descuento en porcentaje <input type="number"  name="descuento" style="width:50px; height:20px" step="0.01" min="0" max="100" required> %
                </div>    
                <div style="margin-top:30px;">
                    <input type="submit" value="Aceptar" id="botonp"  style="margin: 20px 0 0 200px;">
                </div> 
            </form>
            <div style="margin-top: -26px;"><a href="notas.php"><input type="submit" value="Atras" id="botonp" style="margin: -14px 0 0 -200px;" ></a></div>
        </div>    
