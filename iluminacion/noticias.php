<?php
session_start();


 		if($_GET['id_imagen'])
		{	
			$id_imagen=$_GET['id_imagen'];
			
			$file = "imagenesNoticias/".$id_imagen;
			$do = unlink($file);
		}

?>
<!DOCTYPE html>
<html lang="es-MX">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51891618-1', 'auto');
  ga('send', 'pageview');

</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<LINK REL="SHORTCUT ICON" TYPE="IMAGE/ICO" HREF="ico.png">
<!--[if lt IE 9]
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
<![endif]-->

<head>
<body style="padding:0; margin:0">

<div id="arribaa">
	<div id="buscar">
<script>
  (function() {
    var cx = '013486087382821800792:hnrpeclmfyg';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
  
  
  function cerrarSesion()
			{
				if (confirm("¿Realmente desea cerrar sesión?"))
				{
					document.location.href = 'cerrar.php';
				}

				else
				{
					document.location.href = 'index.php';
				}
			}
</script>
<gcse:searchbox-only></gcse:searchbox-only>
</div></div>


<div id="page-wrap" class='centrar'>

<div align="center" >
<div id="logos_centrados"><IMG SRC="logo.png" height="90px" align="left"> <IMG SRC="logocarmanah.png" height="70" align="right"></div>
<div class="break"></div>
<br>

<div class="texto7">
Iluminación Fotovoltaica Profesional 
</div>

<table bgcolor="#38444b" width="1020" >

<tr >
 
<td style=" border-right: 2px ridge white; color: white; font-family: Arial, sans serif; font-size: 8pt; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <?php session_start(); if (isset($_SESSION['usuario'])){echo '<a onclick="cerrarSesion()">Cerrar Sesión</a>';}?></td>
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/index.php" id="inicio"> Inicio </a></td> 
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/productos.php" id="inicio"> Productos</a></td> 
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/proyectos.php" id="inicio"> Proyectos</a></td> 
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/index.php" id="inicio"> Capacitación</a></td> 
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/conocenos.php" id="inicio"> ¿Quiénes somos?</a></td> 
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/videos.php" id="inicio"> Videos</a></td> 
<td style=" border-right: 2px ridge white;"><a href="http://www.bestlightmexico.com.mx/iluminacion/contactanos.php" id="inicio"> Contáctanos</a></td>
<td style=" color: white; font-family: Arial, sans serif; font-size: 8pt; font-weight: bold;"><?php if(isset($_SESSION['usuario'])) {echo "Bienvenido ".$_SESSION['usuario'];}else{echo '<a href="login4.php" id="inicio">Iniciar Sesión</a>';}?>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 


</tr>

</table >
<div id="menu">
<a href="index.php" style="color:white">Inicio « </a> <span> Noticias </span> 
</div>

</div>
<br />
<br />

<?php
/* Abrimos la base de datos */

	include('funciones_mysql.php');
	$conexion = conectar();
	if(isset($_GET['verNoticia']))
{
	$verNoticia = $_GET['verNoticia'];
	$sql="select * from Noticias WHERE id_noticias='$verNoticia'";
	$result= mysql_query($sql) or die(mysql_error());
	while ($campo = mysql_fetch_array($result))
	{
		
		echo 
			"<div id='revisarNoticia'>
			<h1>".$campo['titulo']."</h1>
				
				<br />
				
				<div id='fechaRevisarNoticia'>"			
				.$campo['fecha'].				
				"</div>
				
				<br />
				<br />
				
				<div id='descripcionRevisarNoticia'>"				
					.$campo['descripcion'].				
				"</div>
				
				<br />
				
				<img src='imagenesNoticias/".$campo['id_imagen']."'>
				
				<br />
				<br />
				
				<div id='autorRevisarNoticia'>"				
					.$campo['autor']."
				</div>
				
				
				
				
			</div>"
		;
	}
}


/* Realizamos la consulta SQL */

$sql="select * from Noticias ORDER BY fecha DESC";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) echo "No hay noticias para mostrar";

echo '<div id="contenedorNoticias">
	<div id="contenedorInfinito">';
while ($campo = mysql_fetch_array($result)) 
{
	
	$limitar = substr($campo['descripcion'],0,100);
	$id_noticia=$campo['id_noticias'];
	
echo 
"		
	<div id='noti' class='centrar floatLeft'>
		<table cellpadding='0' cellspacing='0' >	
			<tr id='headerTabla'>
				<td>
					<div id='tituloTabla'>".$campo['titulo']."</div>
					<br />
					<br />
					<div class='fechaTabla'>".$campo['fecha']."</div>
				</td>
			</tr>			
			<tr>
				<td>
					<div id='parrafo'>".$limitar."...<br /><a href='noticias.php?verNoticia=$id_noticia'>Leer más...</a></div>
";					 if($campo['id_imagen']==""){}else{ echo "<div class='imagenNoticia'><img src='imagenesNoticias/".$campo['id_imagen']."'></div>"; }
				echo "
				</td>
			</tr>	
			<tr>
				<td>
					<div class='autorNoticia'>".$campo['autor']."</div>
					<div class='break'></div>
					<div class='lineaDivisora'></div>
					<br />
					<a id='verNoticia' href='noticias.php?verNoticia=$id_noticia'>Ver noticia</a>
				</td>
			</tr>
		</table>	
	</div>
	
";
}


?>
</div>
</div>
<div class="break"></div>
<? if(isset($_SESSION['usuario'])){?><button onclick="aparecePassword()" id="aparecePassword">Agregar Noticia </button> <?php } ?>

 <script> 

	function aparecePassword()
	{	
		document.getElementById('letrasPassword').style.visibility = "visible";
		document.getElementById('inputPassword').style.visibility = "visible";
		document.getElementById('botonIngresar').style.visibility = "visible";
		document.getElementById('esconderPassword').style.visibility = "visible";
		document.getElementById('aparecePassword').style.visibility = "hidden";
		document.getElementById('letrasPassword').style.opacity = "1";
		document.getElementById('inputPassword').style.opacity = "1";
		document.getElementById('botonIngresar').style.opacity = "1";
		document.getElementById('esconderPassword').style.opacity = "1";
		document.getElementById('aparecePassword').style.opacity = "0";
	}
	
	function esconderPassword()
	{
		document.getElementById('letrasPassword').style.visibility = "hidden";
		document.getElementById('inputPassword').style.visibility = "hidden";
		document.getElementById('botonIngresar').style.visibility = "hidden";
		document.getElementById('aparecePassword').style.visibility = "visible";
		document.getElementById('letrasPassword').style.opacity = "0";
		document.getElementById('inputPassword').style.opacity = "0";
		document.getElementById('botonIngresar').style.opacity = "0";
		document.getElementById('esconderPassword').style.opacity = "0";
		document.getElementById('aparecePassword').style.opacity = "1";
		
	}
	
	<?php 
		if(isset($_GET['error']))
		{
	?>
	
			alert("Password incorrecto, intente de nuevo");
			
	<?php	
		}
		
	?>
 </script>

 <br />
<br />
<form action="noticias2.php" method="POST" class="centrar">
<div id="letrasPassword">Ingresa Password</div>
<br />
<input id="inputPassword" type="password" name="password">
<br />
<br />
<input id="botonIngresar" type="submit" value="Ingresar">
</form>
<br />
<br />
<button id="esconderPassword" onclick="esconderPassword()">Cancelar</button>

<br>

<div align="center" >

<div id="contenedor">

<a href="https://www.youtube.com/channel/UChpLTqTCVyJl2tgeCuZ8CIQ/videos" target="new" >
<img alt="youtube" src="youtube.png" title="Best Ligth México on Youtube" id="youtube">
</a>

</div>



<table bgcolor="#38444B" width="1020"  border="0" cellpadding="2" heigth="100">
<tr>
<td >&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <a href="http://www.bestlightmexico.com.mx/iluminacion/inicio.php" id="pie" > Inicio </a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/productos.php" id="pie" > Productos</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/proyectos.php" id="pie" > Proyectos</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/inicio.php" id="pie" > Capacitación</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/conocenos.php" id="pie" > ¿Quiénes somos?</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/videos.php" id="pie" > Videos</a></td> 
<td><a href="http://www.bestlightmexico.com.mx/iluminacion/contactanos.php" id="pie"> Contáctanos</a>
<td><a href="http://www.bestlightmexico.com.mx/iluminacion/noticias.php" id="pie"> Noticias</a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>

<a href="http://www.bestlightmexico.com.mx/attachments/File/apblm.pdf" id="texto9" align="center"> Aviso de Privacidad<br><br></a>
</div>

<br>


</html>
