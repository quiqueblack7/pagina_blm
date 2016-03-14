<!DOCTYPE html>
<html lang="es-MX">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="estilo.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="css/style4.css" />
<LINK REL="SHORTCUT ICON" TYPE="IMAGE/ICO" HREF="ico.png">
<script src="ajax.js" language="JavaScript"></script>
<!--[if lt IE 9]
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
<![endif]-->
</head>
<body style="padding:0; margin:0" >

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

<div align="center" >
<div id="logos_centrados"><IMG SRC="logo.png" height="90px" align="left"> <IMG SRC="logocarmanah.png" height="70" align="right"></div>
<div class="break"></div>
<br />

<div class="texto7">
Iluminación Fotovoltaica Profesional 
</div>

<table bgcolor="#38444B" width="1020" >

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

</table  >

<div id="menu">
<a href="index.php" style="color:white">Inicio « </a> <span> Producto BLM-EG-320</span> 
</div>
</div>

<br>

<!--- INICIO DE LA NUEVA PAGINA WEB -->

<table  width="1020" align="center" border=0>
<tr>

<td >
<IMG SRC="eg320txt.jpg" align=left>
</td>

<td>
</td>
</tr>

<tr>
<td>
	<img src="beneficios.jpg" value="Mostrar2" onclick="mostrar2()" id="brillo" align="left"> 
<img src="caracteristicas.jpg" value="Mostrar" onclick="mostrar()"  id="brillo" align="left">
<br>


<table width=510 height=300  style="border-style:solid; border-color:#8B8B8B; boder-width:3px;" cellspacing="20px" >
	<tr>
		<td>
<div id='carac' style='display:none;' align="left">
<div id="texto4">
-Hasta 6,010 lúmenes<br>
-Iluminacion adaptativa(perfiles de operación)<br>
-Hasta dos luminarias por unidad<br>
-Distribuciones IES estándares:<br>
Tipos ll,lll,lV,V<br>
-Temperaturas de color 5700K y 4000K<br>
-Garantia limitada por 3 años<br>

</div>
</div>

<div id='bene' style='display:block;' align="left">
	
		
<div id="texto4">El EG300, primer sistema de iluminación de caminos de la Serie EG, ideal para aplicaciones de iluminación de caminos,perimetros y estacionamientos pequeños.</div>
</td>
</tr>

</div>
</td>
</tr>
<td>
</table>

<script type="text/javascript">
function mostrar(){
document.getElementById('carac').style.display = 'block';
document.getElementById('bene').style.display = 'none';
}

function mostrar2(){
document.getElementById('bene').style.display = 'block';
document.getElementById('carac').style.display = 'none';
}

</script>
</td>



<td>


<td>



<div id=vuelta style='display:block;'>
<IMG SRC="320.jpg" height="350" width="350">
<div id='texto6'> VUELTA </div>
</div>

<script type="text/javascript">
function frente(){
document.getElementById('frente').style.display = 'block'; 
document.getElementById('vuelta').style.display = 'none';
}

function vuelta(){
document.getElementById('vuelta').style.display = 'block';
document.getElementById('frente').style.display = 'none';
}
</script>





</td>


</tr>
<td valign="top" align="left">
	
	        <div class="container">
			
			
			<section>
                <div id="container_buttons">
                    <p>
                        <a class="a_demo_four" href="http://bestlightmexico.com.mx/attachments/File/EG-300ientos.pdf">
                            Ficha Técnica!
                        </a>
                    </p>
                   
                </div>
			</section>
        </div>

</td>
</table>





<!--- INICIO DEL PIE DE PAGINA -->
<br><br>
<div align="center" >

<div id="contenedor">

<a href="https://www.youtube.com/channel/UChpLTqTCVyJl2tgeCuZ8CIQ/videos" target="new" >
<img alt="youtube" src="youtube.png" title="Best Ligth México on Youtube" id="youtube">
</a>

</div>
<table bgcolor="#38444B" width="1020"  border="0" cellpadding="2" heigth="100" align="center">
<tr>
<td >&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; <a href="http://www.bestlightmexico.com.mx/iluminacion/inicio.php" id="pie" > Inicio </a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/productos.php" id="pie" > Productos</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/proyectos.php" id="pie" > Proyectos</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/inicio.php" id="pie" > Capacitacion</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/conocenos.php" id="pie" > Quienes somos?</a></td> 
<td ><a href="http://www.bestlightmexico.com.mx/iluminacion/videos.php" id="pie" > Videos</a></td> 
<td><a href="http://www.bestlightmexico.com.mx/iluminacion/contactanos.php" id="pie"> Contactanos</a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
<a href="http://www.bestlightmexico.com.mx/attachments/File/apblm.pdf" id="texto9" align=center> Aviso de Privacidad</a>
</div>
<br>
</body>
</html>


