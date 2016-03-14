<?php

if (isset($_GET['partida'])) {
    $partida = $_GET['partida'];
} else {
    $partida = " ";
}


$var = "hola + te quiero";
echo $var;

echo "<br>$partida";
?>

