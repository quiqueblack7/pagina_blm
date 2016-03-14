<?php

//Capturamos el usuario autenticado
session_start();

unset($_SESSION['cotizacion']);
unset($_SESSION['empresa']);
unset($_SESSION['cancelar']);

header('Location: partidas3.php');
?>