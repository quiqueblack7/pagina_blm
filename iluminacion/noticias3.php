<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8'); 
	
	include ("funciones_mysql.php");
	
	$conexion = conectar();
	
	$sql="SELECT * FROM Noticias ORDER BY id_noticias DESC LIMIT 1";
$resultado = query($sql, $conexion);

	$campo = mysql_fetch_row($resultado);
	$id_noticias = $campo[0] + 1;

	if ($id_noticias == "") 
	{
		$id_noticias= 1;
	}
	
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$fecha = date("Y-m-d");
	$autor = $_POST['autor'];
	$id_imagen = $_SESSION['id_imagen'];
	
	utf8_decode($titulo);
	utf8_decode($descripcion);
	utf8_decode($autor);
	
	
	$sql = "INSERT INTO Noticias (id_noticias, titulo, descripcion, fecha, autor, id_imagen) VALUES ('$id_noticias','$titulo','$descripcion','$fecha','$autor','$id_imagen')";
	$resultado = query($sql, $conexion);
	
	unset($_SESSION['id_imagen']);
	
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
    <script type="text/javascript">
        function regresar() {
            alert("La noticia se publico con exito");
            document.location.href = 'noticias.php';
        }
        regresar()

    </script>

</html>

