<?php
session_start();

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$id_usuario=$_POST['id_usuario'];
$password=$_POST['password'];
$correo=$_POST['correo'];
$estado=$_POST['estado'];
$sexo=$_POST['sexo'];
$telefono=$_POST['telefono'];
$tipo_usuario=$_POST['tipo_usuario'];


//Agregar Campos en la Tabla Cotizaciones
$sqla = "INSERT INTO `Registro` (nombre, apellidos, id_usuario, password, correo, estado, sexo, telefono, tipo_usuario) values ('$nombre', '$apellidos', '$id_usuario', '$password', '$correo', '$estado', '$sexo', '$telefono', '$tipo_usuario')";
$resultadoa = query($sqla, $conexion);
?>

<html>

    <script type="text/javascript">
        function regresar() {
            alert("El registro se llevo a cabo con exito");
            document.location.href = 'index.php';
        }
        regresar()

    </script>

</html>
