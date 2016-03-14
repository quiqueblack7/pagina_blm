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
<script src="ajax.js" language="JavaScript"></script>
<LINK REL="SHORTCUT ICON" TYPE="IMAGE/ICO" HREF="ico.png">
<!--[if lt IE 9]
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
<![endif]-->
</head>
  <body style="padding:0; margin:0" onload="CambiarColor1()">

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

  <div id="page-wrap">


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
  <a href="index.php" style="color:white">Inicio « </a> <span> Proyectos </span>
  </div>

  </div>
  <br>
  <div id="texto8">&nbsp;Proyectos en México</div>
  <br><br>

  <a href="javascript:;" onclick="CambiarColor1()" id="enlace1">
  <button style="padding:4px; background:#333333;" id="wscolor" class="boton" href="caneguin.php">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </button>
  </a>


  <a href="javascript:;" onclick="CambiarColor2()" id="enlace2">
  <button style="padding:4px; background:#333333;" id="adcolor" class="boton" href="puebla.php">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </button>
  </a>

  <a href="javascript:;" onclick="CambiarColor3()" id="enlace3">
  <button style="padding:4px; background:#333333;" id="adccolor" class="boton" href="veracruz.php">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </button>
  </a>

  <a href="javascript:;" onclick="CambiarColor4()" id="enlace4">
  <button style="padding:4px; background:#333333;" id="akcolor" class="boton" href="tresg.php">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </button>
  </a>

  <a href="javascript:;" onclick="CambiarColor5()" id="enlace5">
  <button style="padding:4px; background:#333333;" id="alcolor" class="boton" href="poli.php">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </button>
  </a>


  <div id="detalles">

  <table border=0 width="800px">

  <tr>
  <td >

  <IMG SRC="caneguin.jpg" height="315" width="650">


  </td>

  <td valign="top" width="200px">

  <img id="imagen" src="320.jpg" height="220">
  <a href="blm320.php"><img src="320tx.jpg"  > </a>

  </td>

  </tr>
  <tr>

  <th colspan="2">
  <br>
  <div id="texto6" align="justify"> PARQUE CANEGUIN-MÉXICO D.F. </div>
  <br><br>
  <div id="texto4" align="justify">
  Uno de los parques más representativos en el Distrito Federal sus caminos están iluminados con LED solar y EG-340 este luminario está diseñado específicamente para satisfacer las necesidades de aplicaciones de iluminación de estas características, además su forma estética se funde con el aspecto general del espacio verde del parque, así mismo proporciona una instalación que preserva la integridad del patrimonio.
  </div>
  </th>

  </tr>
  </table>
  </div>


  <br><br><br><br>

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
  &nbsp;&nbsp;&nbsp; <a href="http://www.bestlightmexico.com.mx/iluminacion/inicio.php" id="pie" > Inicio </a></td>
  <td ><a href="http://www.bestlightmexico.com.mx/iluminacion/productos.php" id="pie" > Productos</a></td>
  <td ><a href="http://www.bestlightmexico.com.mx/iluminacion/proyectos.php" id="pie" > Proyectos</a></td>
  <td ><a href="http://www.bestlightmexico.com.mx/iluminacion/inicio.php" id="pie" > Capacitación</a></td>
  <td ><a href="http://www.bestlightmexico.com.mx/iluminacion/conocenos.php" id="pie" > ¿Quiénes somos?</a></td>
  <td ><a href="http://www.bestlightmexico.com.mx/iluminacion/videos.php" id="pie" > Videos</a></td>
  <td><a href="http://www.bestlightmexico.com.mx/iluminacion/contactanos.php" id="pie"> Contáctanos</a>&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  </table>

  <a href="http://www.bestlightmexico.com.mx/attachments/File/apblm.pdf" id="texto9" align="center"> Aviso de Privacidad<br><br></a>
  </div>
  <br>
  <script type="text/javascript" src="js/animaciones.js"></script>
  </body>
</html>
