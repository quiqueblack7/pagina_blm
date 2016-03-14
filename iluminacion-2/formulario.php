<?php
$to = "enriquerodriguez@artefactosluminicos.com.mx";
$subject = "Correo de prueba";
$message = "Este es sólo un mensaje de prueba.";
$from = "enriquerodriguez@artefactosluminicos.com.mx";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Correo enviado";
?>
