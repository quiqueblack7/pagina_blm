<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

echo "Bienvenido " . $_SESSION['usuario'];
echo " Tu pass es: " . $_SESSION['password'];
?>
