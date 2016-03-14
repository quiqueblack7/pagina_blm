<?php

	session_start();
	
	include("funciones_mysql.php");
	
	$conexion = conectar();
	
	$sql = "SELECT * FROM Noticias ORDER BY `id_noticias` DESC LIMIT 1";
	$resultado = query($sql, $conexion);

	$campo = mysql_fetch_row($resultado);
	$noimg = $campo[0] + 1;

	if ($noimg == "") 
	{
		$noimg = 1;
	}
	/*
	echo $_FILES['imagen']['type']."<br />";
	echo $_FILES['imagen']['tmp_name']."<br />";
	echo $_FILES['imagen']['size']."<br />";
	echo $_FILES['imagen']['error']."<br />";
	*/
	if($_FILES['imagen']['type']=="image/jpg")
	{
		$formato=".jpg";
	}	
	
	if($_FILES['imagen']['type']=="image/jpeg")
	{
		$formato=".jpeg";
	}	
	
	if($_FILES['imagen']['type']=="image/gif")
	{
		$formato=".gif";
	}	
	
	if($_FILES['imagen']['type']=="image/png")
	{
		$formato=".png";
	}
	
	
	
	$id_imagen="img".$noimg.$formato;
	
	$_SESSION['id_imagen']=$id_imagen;
	
	
	
	$_FILES['imagen']['name']= "img".$noimg.$formato;
	
	if($_FILES['imagen']['error'] > 0)
	{
		echo "ha ocurrido un error";
	}
	
	else
	{
		$permitidos = array("image/jpg","image/jpeg","image/gif","image/png");
		$limite_kb = 100000;
		
		if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
		{
			$ruta = "imagenesNoticias/".$_FILES['imagen']['name'];
			
			if(!file_exists($ruta))
			{
				$resultado = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
				
				if($resultado)
				{
					header("Location: noticias2.php?archivo=$id_imagen");
				}
				
				else
				{
					echo "ocurrio un error al mover el archivo";
				}
				
			}
			
			else
			{			
				$do = unlink($ruta);
				
				$resultado = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
				
				if($resultado)
				{
					header("Location: noticias2.php?archivo=$id_imagen");
				}
				
				else
				{
					echo "ocurrio un error al mover el archivo";
				}
			}
			
		}

		else
		{
			echo "archivo no permitido, es de tipo prohibido o excede el tamaño";
		}
	
	}
?>