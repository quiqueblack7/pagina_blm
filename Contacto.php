<?php
require_once('init.php');
$loadClass = SB_Modules::loadClass('Modules_Login');
$loginObject = new Modules_Login('5zwbvo7o26i');
$loginObject->init();
$loginObject->processAction();
$loadClass = SB_Modules::loadClass('Modules_Feedback');
$feedbackObject = new Modules_Feedback('swo6z7gh2k1');
$feedbackObject->init();
$feedbackObject->processAction();
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Best Light Mexico - Contacte conmigo</title>
<meta name="DESCRIPTION" content="">
<meta name="KEYWORDS" content="">
<meta name="GENERATOR" content="Parallels Plesk Sitebuilder 4.5.0">
</head>
<body class="pageContent"><div style="text-align: center;">    <head>
    <title></title>
    <style type="text/css">
    body{


              background-image:url('http://www.bestlightmexico.com.mx/attachments/Image/Fondo.jpg');
              background-repeat:repeat;
              background-position:0px 0px;

              
    }
    </style>
    </head><img width="877" height="100" src="attachments/Image/baner_ofciial.jpg" alt="" /><br />
<a href="Best_Ligth_Mexico.php"><img width="96" height="46" src="attachments/Image/sobrante.jpg" alt="" /><img width="98" height="46" src="attachments/Image/boton_inicio.jpg" alt="" /></a><a href="Proyectos2.php"><img width="98" height="46" src="attachments/Image/boton_proyectos.jpg" alt="" /></a><a href="Conocenos.php"><img width="98" height="46" src="attachments/Image/boton_quienes.jpg" alt="" /></a><a href="Catalogo.php"><img width="98" height="46" src="attachments/Image/boton_cat__logo.jpg" alt="" /></a><a href="Capacitacion.php"><img width="98" height="46" alt="" src="attachments/Image/boton_capacitacion.jpg" /></a><a href="Videos.php"><img width="97" height="46" src="attachments/Image/boton_video.jpg" alt="" /></a><a href="Contacto.php"><img width="98" height="46" src="attachments/Image/boton_contacto.jpg" alt="" /><img width="96" height="46" src="attachments/Image/sobrante2.jpg" alt="" /></a></div>
<table width="521" cellspacing="1" cellpadding="1" border="0" align="center">
    <tbody>
        <tr>
            <td>
            <div><strong><span class="Title"><img width="116" height="77" alt="" src="attachments/Image/LOGO2P.jpg" /></span></strong>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <strong><span class="Title"><strong><span class="Title"><strong><span class="Title">VENTAS Y ASESORIA</span></strong></span></strong><br />
            </span></strong>
            <p style="text-align: left;"><strong><span class="Title"> </span></strong><strong><span class="Title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            </span></strong></p>
            <p style="margin-left: 40px;">TELEFONOS DIRECTOS<br />
            (55) 5870 15 10 <span class="Title"><br />
            (55) 26 20 23 13<br />
            <br />
            E-MAIL<br />
            </span><span style="font-size: medium;"><span class="Title">ventas@bestlightmexico.com.mx</span></span><span class="Title"><br />
            <br />
            CENTRO DE CAPACITACI&Oacute;N &amp; SALA DE EXHIBICI&Oacute;N<br />
            Av. Juarez #9 Int I, San Mateo Ixtacalco Cuautitl&aacute;n<br />
            Izcalli, Estado de M&eacute;xico. CP 54713<br />
            <br />
            </span></p>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <div><?php
echo $feedbackObject->getContentBlock();
?></div>
            </td>
        </tr>
    </tbody>
</table>
<div style="text-align: center;"><a href="http://www.bestlightmexico.com.mx/attachments/File/apblm.pdf">Aviso de Privacidad</a></div></body>
</html>
<?php
$feedbackObject->destruct();
?>