<?php
require_once('init.php');
$loadClass = SB_Modules::loadClass('Modules_Login');
$loginObject = new Modules_Login('5zwbvo7o26i');
$loginObject->init();
$loginObject->processAction();
$loadClass = SB_Modules::loadClass('Modules_Feedback');
$feedbackObject = new Modules_Feedback('i7k0n9aulcs');
$feedbackObject->init();
$feedbackObject->processAction();
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Best Light Mexico - Contactanos2</title>
<meta name="DESCRIPTION" content="">
<meta name="KEYWORDS" content="">
<meta name="GENERATOR" content="Parallels Plesk Sitebuilder 4.5.0">
</head>
<body class="pageContent"><div>
<div>
<div>
<div>
<div>
<div>
<div>
<div>
<div>&nbsp;</div>
<div><body style="background:#FFFFFF"> 

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" height="90%" width="100%">
  <param name="movie" value="/attachments/File/contactanos.swf">
  <param name="quality" value="high">
  <param name="wmode" value="transparent">
  <param name="SCALE" value="default">
     <embed src="/attachments/File/contactanos.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" scale="default" pluginspage="http://www.macromedia.com/go/getflashplayer" height="90%" width="100%">
</object></div>
</div>
<table width="751" height="314" cellspacing="1" cellpadding="1" border="0" align="center">
    <tbody>
        <tr>
            <td><br />
            <div><?php
echo $feedbackObject->getContentBlock();
?></div>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<table width="1200" height="202" cellspacing="1" cellpadding="1" border="0" align="center">
    <tbody>
        <tr>
            <td>
            <div><body style="background:#FFFFFF"> 

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" height="120%" width="100%">
  <param name="movie" value="/attachments/File/menu_inferior.swf">
  <param name="quality" value="high">
  <param name="wmode" value="transparent">
  <param name="SCALE" value="default">
     <embed src="/attachments/File/menu_inferior.swf" quality="high" type="application/x-shockwave-flash" wmode="transparent" scale="default" pluginspage="http://www.macromedia.com/go/getflashplayer" height="120%" width="100%">
</object><br />
            <br />
            <br />
            &nbsp;</div>
            </td>
        </tr>
    </tbody>
</table>
<div style="text-align: center;"><a href="http://www.bestlightmexico.com.mx/attachments/File/apblm.pdf">Aviso de Privacidad</a></div></body>
</html>
<?php
$feedbackObject->destruct();
?>